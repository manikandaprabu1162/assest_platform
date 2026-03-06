<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PurchaseController extends Controller
{
    protected $razorpay;

    public function __construct()
    {
        $this->razorpay = new Api(
            config('services.razorpay.key_id'),
            config('services.razorpay.key_secret')
        );
    }

    public function show(Asset $asset)
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to purchase this asset.');
        }

        $existingPurchase = Purchase::where('user_id', Auth::id())
            ->where('asset_id', $asset->id)
            ->where('payment_status', 'completed')
            ->first();

        if ($existingPurchase) {
            return redirect()->route('assets.show', $asset)
                ->with('info', 'You already own this asset!');
        }

        return view('purchases.show', compact('asset'));
    }


    public function createOrder(Asset $asset)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required.'
                ], 401);
            }
            $pendingPurchase = Purchase::where('user_id', $user->id)
                ->where('asset_id', $asset->id)
                ->where('payment_status', 'pending')
                ->first();

            if ($pendingPurchase) {
                return response()->json([
                    'success' => true,
                    'order_id' => $pendingPurchase->order_id,
                    'amount' => $asset->price * 100,
                    'key' => config('services.razorpay.key_id')
                ]);
            }

            $order = $this->razorpay->order->create([
                'receipt' => 'asset_' . $asset->id . '_' . time(),
                'amount' => (int)($asset->price * 100),
                'currency' => 'INR',
                'notes' => [
                    'user_id' => $user->id,
                    'user_email' => $user->email,
                    'asset_id' => $asset->id,
                    'asset_name' => $asset->name
                ]
            ]);

            Purchase::create([
                'user_id' => $user->id,
                'asset_id' => $asset->id,
                'price' => $asset->price,
                'order_id' => $order->id,
                'payment_status' => 'pending',
                'currency' => 'INR'
            ]);

            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'amount' => $asset->price * 100,
                'key' => config('services.razorpay.key_id')
            ]);

        } catch (\Exception $e) {
            Log::error('Razorpay order creation failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to create payment order. Please try again.'
            ], 500);
        }
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'asset_id' => 'required|exists:assets,id'
        ]);

        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required.'
                ], 401);
            }
            $this->verifySignature(
                $request->razorpay_order_id,
                $request->razorpay_payment_id,
                $request->razorpay_signature
            );

            $purchase = Purchase::where('order_id', $request->razorpay_order_id)
                ->where('user_id', $user->id)
                ->where('payment_status', 'pending')
                ->firstOrFail();

            $payment = $this->razorpay->payment->fetch($request->razorpay_payment_id);

            DB::beginTransaction();
            $purchase->update([
                'transaction_id' => $request->razorpay_payment_id,
                'payment_status' => 'completed',
                'payment_response' => $payment->toArray(),
                'purchased_at' => now()
            ]);
            DB::commit();

            session()->forget('razorpay_order_id');

            return response()->json([
                'success' => true,
                'message' => 'Payment successful! You can now download your asset.',
                'redirect' => route('assets.show', $purchase->asset_id) . '?purchased=1'
            ]);

        } catch (SignatureVerificationError $e) {
            Log::error('Payment signature verification failed: ' . $e->getMessage());
            Purchase::where('order_id', $request->razorpay_order_id)
                ->update(['payment_status' => 'failed']);
            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed. Please contact support.'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Payment processing failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to process payment. Please try again.'
            ], 500);
        }
    }

    private function verifySignature($orderId, $paymentId, $signature)
    {
        $generatedSignature = hash_hmac(
            'sha256',
            $orderId . '|' . $paymentId,
            env('RAZORPAY_KEY_SECRET')
        );

        if (!hash_equals($generatedSignature, $signature)) {
            throw new SignatureVerificationError('Invalid signature');
        }

        return true;
    }

    public function paymentFailed(Request $request)
    {
        $error = $request->input('error');
        
        Log::warning('Payment failed: ' . json_encode($error));

        if ($request->has('order_id')) {
            Purchase::where('order_id', $request->order_id)
                ->where('user_id', Auth::id())
                ->update([
                    'payment_status' => 'failed',
                    'payment_response' => ['error' => $error]
                ]);
        }

        return redirect()->route('assets.index')
            ->with('error', 'Payment failed. Please try again.');
    }

    public function myPurchases()
    {
        $purchases = Purchase::with('asset')
            ->where('user_id', Auth::id())
            ->where('payment_status', 'completed')
            ->orderBy('purchased_at', 'desc')
            ->paginate(10);

        return view('purchases.my-purchases', compact('purchases'));
    }

    public function download(Asset $asset)
    {
        $purchase = Purchase::where('user_id', Auth::id())
            ->where('asset_id', $asset->id)
            ->where('payment_status', 'completed')
            ->first();

        if (!$purchase) {
            return redirect()->route('assets.show', $asset)
                ->with('error', 'You need to purchase this asset first.');
        }

        $filePath = storage_path('app/public/' . $asset->file_path);
        
        if (!file_exists($filePath)) {
            Log::error('Asset file not found: ' . $filePath);
            return redirect()->route('assets.show', $asset)
                ->with('error', 'Asset file not found. Please contact support.');
        }

        Log::info('User ' . Auth::id() . ' downloaded asset ' . $asset->id);

        return response()->download($filePath, $asset->name . '.' . pathinfo($asset->file_path, PATHINFO_EXTENSION));
    }

    public function checkStatus(Asset $asset)
    {
        $purchase = Purchase::where('user_id', Auth::id())
            ->where('asset_id', $asset->id)
            ->where('payment_status', 'completed')
            ->first();

        return response()->json([
            'purchased' => !is_null($purchase),
            'purchase' => $purchase ? [
                'id' => $purchase->id,
                'purchased_at' => $purchase->purchased_at?->format('Y-m-d H:i:s'),
                'transaction_id' => $purchase->transaction_id
            ] : null
        ]);
    }
}