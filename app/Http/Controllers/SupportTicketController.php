<?php

namespace App\Http\Controllers;

use App\Models\supportTicket;
use App\Models\SupportTicketReply;
use App\Notifications\UserSubmitTicketNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    function __construct()
    {
        $this->middleware('web', ['CheckPermission:SubmitSupportTicket']);
    }
    public function index()
    {
        $user = Auth::user();
        $tickets = supportTicket::where('user_id', $user->id)->get();
        return view('front.support', get_defined_vars());
    }
    public function store(Request $request)
    {
        $tickets = supportTicket::firstOrCreate([
            'user_id' => Auth::user()->id,
            'subject' => $request->subject,
            'message' => $request->message,
            'status' => 'open',

        ]);
        $user = Auth::user();
        $user->notify(new UserSubmitTicketNotification($user));
        return redirect()->back()->with('status', 'ticketSubmitted');
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


        $reply->user_id = Auth::user()->id;
        if ($ticket->status !== 'closed') {
            $ticket->status = 'open';
            $reply->save();
            $ticket->save();
        }
        return back()->with('success', 'Reply sent.');
    }

    public function myTickets()
    {
        $user = Auth::user();
        $tickets = SupportTicket::where('user_id', $user->id)
            ->latest()
            ->get();
        $tickets->load('replies');
        return view('front.viewAllTickets', compact('tickets'));
    }
    public function UpdateTicketStatus(Request $request, supportTicket $ticket)
    {
        $ticket->status = $request->status;
        return redirect()->with('success', 'Status updated');
    }
}
