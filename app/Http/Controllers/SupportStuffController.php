<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use App\Models\SupportStuffLogs;
use App\Models\supportTicket;
use App\Models\SupportTicketReply;
use App\Models\Trips;
use App\Models\User;
use App\Notifications\UserSubmitTicketEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportStuffController extends Controller
{
    function __construct()
    {
        // Support Tickets Management
        $this->middleware('support_stuff', ['CheckPermission:ListAllSupportTickets'])->only('index');
        $this->middleware('support_stuff', ['CheckPermission:ViewSupportTicket'])->only(['index', 'replyToTicket']);
        $this->middleware('support_stuff', ['CheckPermission:UpdateTicketStatus'])->only(['index', 'showTickets']);
        $this->middleware('support_stuff', ['CheckPermission:DeleteTicket'])->only(['index', 'updateTicketStatus']);
        $this->middleware('support_stuff', ['CheckPermission:ReplyToSupportTicket'])->only(['index', 'deleteTicket']);
    }
    public function index()
    {
        return view('supportStuff.index', [
            'ordersCount' => Order::count(),
            'tripsCount' => Trips::count(),
            'ticketsCount' => supportTicket::where('status', 'open')->count(),
            'recentOrders' => Order::latest()->take(5)->get(),
            'tickets' => SupportTicket::latest()->take(5)->get(),
            'reviews' => Review::all(),
        ]);
    }
    public function replyToTicket(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $reply = new SupportTicketReply([
            'support_ticket_id' => $ticket->id,
            'message' => $request->message,
        ]);

        if (Auth::guard('support_stuff')->check()) {
            $reply->support_stuff_id = Auth::guard('support_stuff')->user()->id;
            $ticket->status = 'answered';
        }

        $reply->save();
        $ticket->save();

        return back()->with('success', 'Reply sent.');
    }
    public function showTickets($id)
    {
        $ticket = supportTicket::findOrFail($id);
        return view('supportStuff.tickets', ['ticket' => $ticket]);
    }
    public function updateTicketStatus(Request $request, supportTicket $ticket)
    {
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket Closed');
    }
    public function deleteTicket(supportTicket $ticket)
    {
        $ticket->delete();
        return redirect()->back()->with(['status' => 'Ticket deleted successfully!']);
    }
}
