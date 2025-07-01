<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\CampaignUpdate;

class CampaignUpdateController extends Controller
{
    public function create($id)
    {
        $campaign = Campaign::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        return view('pages.campaign.update.create', compact('campaign'));
    }

    public function store(Request $request, $id)
    {
        $campaign = Campaign::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $campaign->updates()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('dashboard')->with('success', 'Update campaign berhasil ditambahkan.');
    }
}
