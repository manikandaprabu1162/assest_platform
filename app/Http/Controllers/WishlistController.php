<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display a listing of the user's wishlist.
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Please login to view your wishlist.');
        }

        $wishlists = Wishlist::with('asset')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Add asset to wishlist (AJAX)
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to add to wishlist.'
            ], 401);
        }

        $request->validate([
            'asset_id' => 'required|exists:assets,id'
        ]);

        try {
            $asset = Asset::findOrFail($request->asset_id);
            
            // Check if already in wishlist
            $existing = Wishlist::where('user_id', Auth::id())
                ->where('asset_id', $asset->id)
                ->first();

            if ($existing) {
                return response()->json([
                    'success' => false,
                    'message' => 'Already in wishlist',
                    'in_wishlist' => true
                ]);
            }

            Wishlist::create([
                'user_id' => Auth::id(),
                'asset_id' => $asset->id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Added to wishlist',
                'in_wishlist' => true
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add to wishlist.'
            ], 500);
        }
    }

    /**
     * Remove asset from wishlist (AJAX)
     */
    public function destroy($assetId)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Authentication required.'
            ], 401);
        }

        try {
            Wishlist::where('user_id', Auth::id())
                ->where('asset_id', $assetId)
                ->delete();

            return response()->json([
                'success' => true,
                'message' => 'Removed from wishlist',
                'in_wishlist' => false
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove from wishlist.'
            ], 500);
        }
    }

    /**
     * Check if asset is in user's wishlist (AJAX)
     */
    public function check(Asset $asset)
    {
        if (!Auth::check()) {
            return response()->json(['in_wishlist' => false]);
        }

        $inWishlist = Wishlist::where('user_id', Auth::id())
            ->where('asset_id', $asset->id)
            ->exists();

        return response()->json(['in_wishlist' => $inWishlist]);
    }
}
