<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Laravel\Cashier\Cashier;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['trips'];
    public function scopeSession()
    {
        return $this->where('session_id', session()->getId());
    }
    public function trips()
    {
        return $this->belongsToMany(Trips::class, 'cart_trip', 'cart_id', 'trip_id');
    }
    public function total()
    {
        $price = $this->trips->sum('price');
        return Cashier::formatAmount($price, env('CASHIER_CURRENCY'), App::currentLocale());
    }
}
