<?php

namespace App\Http\Controllers;

use App\Models\Campaign;

class LandingController extends Controller
{
    public function index()
    {
        // Campaign Terbaru: 3 campaign paling baru
        $latestCampaigns = Campaign::latest()->take(2)->get();

        // Campaign Populer: 3 campaign dengan collected_amount tertinggi
        $popularCampaigns = Campaign::orderByDesc('collected_amount')->take(3)->get();

        return view('pages.landing', compact('latestCampaigns', 'popularCampaigns'));
    }
}
