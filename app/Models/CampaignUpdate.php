<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignUpdate extends Model
{
    protected $fillable = ['campaign_id', 'title', 'content', 'image'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
