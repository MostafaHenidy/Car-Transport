<?php

namespace App\Http\Controllers;

use App\Models\supportTicket;
use App\Notifications\UserSubmitTicketNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
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
        ]);
        $user = Auth::user();
        $user->notify(new UserSubmitTicketNotification($user));
        return redirect()->back()->with('status', 'ticketSubmitted');
    }

    public function reply(Request $request, SupportTicket $ticket)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);

        // Save reply (optional: create separate replies table if needed)
        $ticket->reply = $request->reply;
        $ticket->status = 'answered';
        $ticket->save();

        // Optional: send email to user

        return redirect()->back()->with('success', 'Reply sent.');
    }
    public function myTickets()
    {
        $user = Auth::user();
        $tickets = SupportTicket::where('user_id', $user->id)
            ->whereNull('parent_id') // only get main tickets, not replies
            ->latest()
            ->get();
        return view('front.viewAllTickets', get_defined_vars());
    }
}
