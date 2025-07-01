<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'donor_name',
        'amount',
        'payment_method',
        'note',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
