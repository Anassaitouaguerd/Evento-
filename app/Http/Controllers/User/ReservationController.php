<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function check_type_event($id)
    {
        $Event = Event::where('id', $id)->first();
        $typeEvent = $Event->type;
        return $typeEvent;
    }
    public function check_user_event($id, $user_id)
    {
        $Event = Event::where('id', $id)->where('user_id', $user_id)->first();
        if ($Event) {
            $userCreateEvent = true;
        } else {
            $userCreateEvent = false;
        }
        return $userCreateEvent;
    }

    public function reservation(ReservationRequest $request)
    {
        $is_find = $this->check_user_event($request->event_id, $request->user_id);
        if ($is_find == true) {
            return back()->with('false', 'You are the createur for this event you can\'t reserve place in this event');
        }
        $ticket = new UserEvent();
        $ticket_token = uniqid();
        $type = $this->check_type_event($request->event_id);
        if ($type == 'manuly') {
            $ticket->status = 'pending';
            $message = 'your reservation in panding mode';
        } else if ($type == 'auto') {
            $ticket->status = 'approved';
            $message = 'your reservation is approved';
        }
        $ticket->user_id = $request->user_id;
        $ticket->event_id = $request->event_id;
        $ticket->ticket_id = $ticket_token;
        $ticket->save();
        return back()->with('success', $message);
    }
}