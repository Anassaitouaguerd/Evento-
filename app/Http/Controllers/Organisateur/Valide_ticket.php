<?php

namespace App\Http\Controllers\Organisateur;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Valide_ticket extends Controller
{
    public function index()
    {
        $tickets = DB::table('user_events as r')
            ->leftJoin('events as e', 'r.event_id', '=', 'e.id')
            ->leftJoin('users as u', 'u.id', '=', 'e.user_id')
            ->leftJoin('users as ru', 'ru.id', '=', 'r.user_id')
            ->where('u.id', '=', session('user')->id)
            ->select('r.*', 'ru.name AS user_name', 'e.name', 'e.description')
            ->get();
        return view('front-office.Organisateure.BoardEvents', compact('tickets'));
    }
    public function rejectTicket(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $ticket = UserEvent::where('id', $request->id)->first();
        $ticket->status = 'rejected';
        $ticket->update();
        return back()->with('success', 'the reservation rejected');
    }
    public function approvTicket(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $ticket = UserEvent::where('id', $request->id)->first();
        $ticket->status = 'approved';
        $ticket->update();
        return back()->with('success', 'the reservation approved');
    }
}
