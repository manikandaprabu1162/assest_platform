<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $assets = Asset::with(['category', 'user'])
            ->where('status', true)
            ->latest()
            ->paginate(12);

        return view('dashboard', compact('assets'));
    }

    public function download(Asset $asset)
    {

        if (!$asset->file_path || !Storage::disk('local')->exists($asset->file_path)) {
            abort(404, 'File not found');
        }

        return Storage::disk('local')->download($asset->file_path, $asset->title . '.zip');
    }

    public function thumbnail(Asset $asset)
    {
        if (!$asset->thumbnail || !Storage::disk('local')->exists($asset->thumbnail)) {
            return redirect('https://placehold.co/600x400/2b2b2b/ffffff?text=No+Image');
        }

        return Storage::disk('local')->response($asset->thumbnail);
    }
}