<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'description',
        'price',
        'thumbnail',
        'preview_link',
        'file_path',
        'tech_json',
        'status'
    ];
    
    protected $casts = [
        'tech_json' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    
    public function attachments()
    {
        return $this->hasMany(AssetAttachment::class);
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }


    public function buyers()
    {
        return $this->belongsToMany(User::class, 'purchases')
            ->withPivot('price', 'transaction_id', 'payment_status', 'purchased_at')
            ->wherePivot('payment_status', 'completed')
            ->withTimestamps();
    }

    public function purchasedBy(User $user): bool
    {
        return $this->purchases()
            ->where('user_id', $user->id)
            ->where('payment_status', 'completed')
            ->exists();
    }


    public function getTotalSalesAttribute(): int
    {
        return $this->purchases()
            ->where('payment_status', 'completed')
            ->count();
    }

    public function getTotalRevenueAttribute(): float
    {
        return $this->purchases()
            ->where('payment_status', 'completed')
            ->sum('price');
    }

    public function getDownloadUrlAttribute(): ?string
    {
        if (auth()->check() && $this->purchasedBy(auth()->user())) {
            return route('assets.download', $this);
        }
        return null;
    }
}