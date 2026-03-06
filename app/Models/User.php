<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
    
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
    
    public function purchasedAssets()
    {
        return $this->belongsToMany(Asset::class, 'purchases')
            ->withPivot('price', 'transaction_id', 'payment_status', 'purchased_at')
            ->wherePivot('payment_status', 'completed')
            ->withTimestamps();
    }

    public function hasPurchased(Asset $asset): bool
    {
        return $this->purchases()
            ->where('asset_id', $asset->id)
            ->where('payment_status', 'completed')
            ->exists();
    }

    public function getTotalSpentAttribute(): float
    {
        return $this->purchases()
            ->where('payment_status', 'completed')
            ->sum('price');
    }

    public function getPurchasesCountAttribute(): int
    {
        return $this->purchases()
            ->where('payment_status', 'completed')
            ->count();
    }
}