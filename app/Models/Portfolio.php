<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function translations()
    {
        return $this->hasMany(PortfolioTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(PortfolioTranslation::class)->where('locale', \App::getLocale());
    }
}
