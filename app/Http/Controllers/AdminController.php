<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Trips;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('back.index', get_defined_vars());
    }
    public function trips()
    {
        $trips = Trips::all();
        return view('back.trips', get_defined_vars());
    }
    public function customers()
    {
        $users = User::all();
        return view('back.customers', get_defined_vars());
    }
}
