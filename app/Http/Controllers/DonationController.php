<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Donation;
use Illuminate\Support\Facades\Session;

class DonationController extends Controller
{
    // Tampilkan form donasi
    public function form($id)
    {
        $campaign = Campaign::findOrFail($id);
        return view('pages.donation.form', compact('campaign'));
    }

    // Proses form donasi dan arahkan ke halaman simulasi pembayaran
    public function process(Request $request, $id)
    {
        $request->validate([
            'donor_name' => 'nullable|string|max:100',
            'amount' => 'required|integer|min:10000',
            'payment_method' => 'required|in:bank_transfer,gopay,ovo,qris',
            'note' => 'nullable|string|max:255',
        ]);

        $campaign = Campaign::findOrFail($id);

        // Simpan data ke session sementara
        Session::put('donation', [
            'campaign_id' => $id,
            'donor_name' => $request->donor_name ?? 'Anonim',
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'note' => $request->note,
        ]);

        return view('pages.donation.payment', [
            'campaign' => $campaign,
            'amount' => $request->amount,
            'method' => $request->payment_method,
        ]);
    }

    public function confirm(Request $request, $id)
    {
        $campaign = Campaign::findOrFail($id);

        $donation = Session::get('donation');

        if (!$donation || $donation['campaign_id'] != $id) {
            return redirect()->route('campaign.show', $id)->with('error', 'Data donasi tidak ditemukan.');
        }

        // Simpan ke tabel donations (dummy data)
        Donation::create([
            'campaign_id'    => $campaign->id,
            'donor_name'     => $donation['donor_name'],
            'amount'         => $donation['amount'],
            'payment_method' => $donation['payment_method'],
            'note'           => $donation['note'],
        ]);

        // Update dana terkumpul di tabel campaign
        $campaign->increment('collected_amount', $donation['amount']);

        // Bersihkan data session
        Session::forget('donation');

        return redirect()->route('campaign.show', $id)->with('success', 'Terima kasih! Donasi Anda telah berhasil disimpan (simulasi).');
    }
}
