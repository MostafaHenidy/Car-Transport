<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripsRequest;
use App\Models\Order;
use App\Models\Review;
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
            'reviews' => Review::all(),
        ]);
    }
    // Support Tickets management
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
    public function showTickets($id)
    {
        $ticket = supportTicket::findOrFail($id);
        return view('back.tickets', ['ticket' => $ticket]);
    }
    // Order management
    public function listAllOrders()
    {
        $orders = Order::paginate(10);
        return view('back.orderList', ['orders' => $orders]);
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
    // Trips management
    public function listAllTrips()
    {
        $trips = Trips::paginate(10);
        return view('back.trips', ['trips' => $trips]);
    }
    public function createTrip(TripsRequest $request)
    {
        $validated = $request->validated();
        $validated['price'] = (int) ($validated['price'] * 100);

        $trip = Trips::create($validated);

        return redirect()->back()->with(['status' => 'Trip created successfully!']);
    }
    public function deleteTrip($tripId)
    {
        Trips::destroy($tripId);
        return redirect()->back()->with(['status' => 'Trip deleted successfull!']);
    }
    public function updateTrips(TripsRequest $request, $tripId)
    {
        // dd($request->all());
        $trip = Trips::findOrFail($tripId);
        $validated = $request->validated();
        $validated['price'] = (int) ($validated['price'] * 100);
        $trip->update($validated);
        $trip->save();
        return redirect()->back()->with(['status' => 'Trip updated successfully!']);
    }
    //  Reviews management
    public function listAllReviews()
    {
        $reviews = Review::paginate(10);
        return view('back.reviewList', ['reviews' => $reviews]);
    }
    public function approveReview($reviewId)
    {
        $review = Review::findOrFail($reviewId);
        $review->update(['approved' => 1]);
        return response()->json(['status' => 'approved']);
    }
}
