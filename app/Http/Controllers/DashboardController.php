<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index()
    {
        $campaigns = Auth::user()->campaigns()->withCount('donations')->latest()->get();
        return view('pages.dashboard.index', compact('campaigns'));
    }
}
