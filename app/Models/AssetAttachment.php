<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssetAttachment extends Model
{
    protected $fillable = [
        'asset_id',
        'preview_image',
        'preview_link'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}