<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Laravel\Cashier\Cashier;

class Trips extends Model
{
    use HasFactory;
    protected $guarded = [];
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
