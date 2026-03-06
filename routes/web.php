<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/assets/{asset}', [AssetController::class, 'show'])->name('assets.show');
    Route::get('/assets/{asset}/download', [AssetController::class, 'download'])->name('assets.download');
    Route::get('/assets/{asset}/thumbnail', [AssetController::class, 'thumbnail'])->name('assets.thumbnail');
    Route::get('/attachments/{attachment}/image', [AssetController::class, 'attachmentImage'])->name('attachments.image');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/asset/{asset}/purchase', [PurchaseController::class, 'show'])->name('asset.purchase');
    
    // Create Razorpay order (AJAX)
    Route::post('/asset/{asset}/create-order', [PurchaseController::class, 'createOrder'])
        ->name('purchase.createOrder');
    
    // Verify payment (AJAX)
    Route::post('/verify-payment', [PurchaseController::class, 'verifyPayment'])
        ->name('purchase.verifyPayment');
    
    // Payment failed callback
    Route::post('/payment-failed', [PurchaseController::class, 'paymentFailed'])
        ->name('payment.failed');
    
    // My purchases page
    Route::get('/my-purchases', [PurchaseController::class, 'myPurchases'])
        ->name('purchases.my');
    
    // Download asset
    Route::get('/asset/{asset}/download', [PurchaseController::class, 'download'])
        ->name('asset.download');
    
    // Check purchase status (AJAX)
    Route::get('/asset/{asset}/check-status', [PurchaseController::class, 'checkStatus'])
        ->name('asset.check-status');
});

require __DIR__.'/auth.php';