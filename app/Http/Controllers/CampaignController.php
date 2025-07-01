<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign;
use App\Models\Category;

class CampaignController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->query('search');
        $categoryId = $request->query('category');

        $categories = Category::all();

        $campaigns = Campaign::with('category')
            ->when($search, fn($q) => $q->where('title', 'like', "%{$search}%"))
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->latest()
            ->paginate(9);

        return view('pages.campaign.index', compact('campaigns', 'categories', 'search', 'categoryId'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.campaign.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'target_amount' => 'required|integer|min:10000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan thumbnail ke storage
        $filename = null;
        if ($request->hasFile('thumbnail')) {
            $filename = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');
            // $request->file('thumbnail')->storeAs('public/thumbnails', $filename);
        }

        // Simpan campaign ke database
        Campaign::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'target_amount' => $request->target_amount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'thumbnail' => $filename,
            'status' => 'pending',
        ]);

        return redirect()->route('campaign.index')->with('success', 'Campaign berhasil dibuat.');
    }


    public function show($id)
    {
        $campaign = Campaign::withCount('donations')
            ->with('category', 'user')
            ->findOrFail($id);

        return view('pages.campaign.show', compact('campaign'));
    }

    public function edit($id)
    {
        $campaign = Campaign::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $categories = \App\Models\Category::all();

        return view('pages.campaign.edit', compact('campaign', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $campaign = Campaign::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'target_amount' => 'required|integer|min:10000',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle update thumbnail jika ada
        if ($request->hasFile('thumbnail')) {
            $filename = time() . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->storeAs('thumbnails', $filename, 'public');
            $campaign->thumbnail = $filename;
        }

        // Update campaign
        $campaign->update([
            'title'         => $request->title,
            'description'   => $request->description,
            'category_id'   => $request->category_id,
            'target_amount' => $request->target_amount,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
        ]);

        return redirect()->route('dashboard')->with('success', 'Campaign berhasil diperbarui.');
    }
}
