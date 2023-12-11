<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTranslation extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }
}
