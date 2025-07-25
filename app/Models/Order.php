<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected  $guarded = [];
    protected $with = ['trips'];
    public function trips()
    {
        return $this->belongsToMany(Trips::class, 'trip_order', 'order_id', 'trip_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
