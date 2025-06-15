<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\supportTicket;
use App\Models\Trips;
use App\Models\User;
use App\Notifications\AdminUpdatedOrderStatusNotification;
use App\Notifications\UserSubmitTicketEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('back.index', [
            'ordersCount' => Order::count(),
            'tripsCount' => Trips::count(),
            'ticketsCount' => SupportTicket::where('status', 'open')->count(),
            'recentOrders' => Order::latest()->take(5)->get(),
            'tickets' => SupportTicket::latest()->take(5)->get(),
        ]);
    }
    public function updateTrips(Request $request, $tripId)
    {
        $trip = Trips::where('id', $tripId);
        $trip->update([
            'name' => $request->name,
            'pickup' => $request->pickup,
            'routes' => $request->routes,
            'transport' => $request->transport,
            'sites' => $request->sites,
            'price' => $request->price * 100,
        ]);
        $trip->save();
        return redirect()->back()->with(['status' => 'success']);
    }
    public function reply(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);
        $ticket->reply = $request->reply;
        $ticket->admin_id = Auth::guard('admin')->user()->id;
        $ticket->status = 'answered';
        $ticket->save();

        // Optional: send email to user
        $user = User::FindOrFail($ticket->user_id);
        $user->notify(new UserSubmitTicketEmailNotification($user, $ticket));
        return redirect()->back()->with('success', 'Reply sent.');
    }
    public function updateOrderStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:confirmed,in_progress,completed,cancelled,failed',
        ]);
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        $user = User::where('id', $order->user_id)->first();
        $user->notify(new AdminUpdatedOrderStatusNotification($order, $user));
        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    public function showTickets($id)
    {
        $ticket = supportTicket::findOrFail($id);
        return view('back.tickets', ['ticket' => $ticket]);
    }
    public function listAllOrders()
    {
        $orders = Order::all();
        return view('back.orderList', ['orders' => $orders]);
    }
    public function listAllTrips()
    {
        $trips = Trips::all();
        return view('back.trips', ['trips' => $trips]);
    }
}
