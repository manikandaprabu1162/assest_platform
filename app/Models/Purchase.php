<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'asset_id',
        'price',
        'transaction_id',
        'order_id',
        'payment_status',
        'currency',
        'payment_response',
        'purchased_at'
    ];


    protected $casts = [
        'price' => 'decimal:2',
        'payment_response' => 'array',
        'purchased_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $dates = [
        'purchased_at',
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'payment_status' => 'pending',
        'currency' => 'INR'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

    public function scopeCompleted($query)
    {
        return $query->where('payment_status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('payment_status', 'pending');
    }

    public function scopeFailed($query)
    {
        return $query->where('payment_status', 'failed');
    }

    public function scopeRefunded($query)
    {
        return $query->where('payment_status', 'refunded');
    }

    public function scopeBetweenDates($query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    public function isCompleted(): bool
    {
        return $this->payment_status === 'completed';
    }

    public function isPending(): bool
    {
        return $this->payment_status === 'pending';
    }

    public function isFailed(): bool
    {
        return $this->payment_status === 'failed';
    }

    public function isRefunded(): bool
    {
        return $this->payment_status === 'refunded';
    }

    public function markAsCompleted(string $transactionId, array $paymentResponse = null): self
    {
        $this->update([
            'transaction_id' => $transactionId,
            'payment_status' => 'completed',
            'payment_response' => $paymentResponse,
            'purchased_at' => now()
        ]);

        return $this;
    }

    public function markAsFailed(array $paymentResponse = null): self
    {
        $this->update([
            'payment_status' => 'failed',
            'payment_response' => $paymentResponse
        ]);

        return $this;
    }

    /**
     * Mark purchase as refunded.
     */
    public function markAsRefunded(array $refundResponse = null): self
    {
        $this->update([
            'payment_status' => 'refunded',
            'payment_response' => $refundResponse
        ]);

        return $this;
    }

    public function getFormattedPriceAttribute(): string
    {
        return $this->currency . ' ' . number_format($this->price, 2);
    }

    public function getPaymentMethodAttribute(): ?string
    {
        return $this->payment_response['method'] ?? null;
    }

    public function getBankAttribute(): ?string
    {
        return $this->payment_response['bank'] ?? null;
    }

    public function getWalletAttribute(): ?string
    {
        return $this->payment_response['wallet'] ?? null;
    }

    public function getVpaAttribute(): ?string
    {
        return $this->payment_response['vpa'] ?? null;
    }

    public function getAcquirerDataAttribute(): ?array
    {
        return $this->payment_response['acquirer_data'] ?? null;
    }

    public function isCardPayment(): bool
    {
        return ($this->payment_response['method'] ?? null) === 'card';
    }

    public function isNetbankingPayment(): bool
    {
        return ($this->payment_response['method'] ?? null) === 'netbanking';
    }

    public function isUpiPayment(): bool
    {
        return ($this->payment_response['method'] ?? null) === 'upi';
    }

    public function isWalletPayment(): bool
    {
        return ($this->payment_response['method'] ?? null) === 'wallet';
    }

    public function getPurchasedAgoAttribute(): ?string
    {
        return $this->purchased_at?->diffForHumans();
    }

    public function getShortTransactionIdAttribute(): ?string
    {
        return $this->transaction_id ? substr($this->transaction_id, 0, 8) . '...' : null;
    }
}