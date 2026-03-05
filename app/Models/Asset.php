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
}