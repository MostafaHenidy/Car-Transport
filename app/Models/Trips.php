<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Laravel\Cashier\Cashier;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Trips extends Model
{
    use HasFactory, HasSlug;
    protected $guarded = [];
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
    public function carts()
    {
        return $this->belongsToMany(cart::class);
    }
    public function price()
    {
        return Cashier::formatAmount($this->price, env('CASHIER_CURRENCY'), App::currentLocale());
    }
    public function order()
    {
        return $this->belongsToMany(order::class);
    }
}
