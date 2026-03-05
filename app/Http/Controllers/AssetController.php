<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(\App\Models\Asset $asset)
    {
        return view('assests.show', compact('asset'));
    }

    public function thumbnail(\App\Models\Asset $asset)
    {
        if (!$asset->thumbnail || !Storage::disk('local')->exists($asset->thumbnail)) {
            return redirect('https://placehold.co/600x400/2b2b2b/ffffff?text=No+Image');
        }

        return Storage::disk('local')->response($asset->thumbnail);
    }

    public function download(\App\Models\Asset $asset)
    {
        if (!$asset->file_path || !Storage::disk('local')->exists($asset->file_path)) {
            abort(404, 'File not found');
        }

        return Storage::disk('local')->download($asset->file_path, $asset->title . '.zip');
    }
}