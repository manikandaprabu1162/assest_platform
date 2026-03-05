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

    // The download and thumbnail methods have been moved to AssetController.
    // Leaving this file with only the index method; close the class below.

}
