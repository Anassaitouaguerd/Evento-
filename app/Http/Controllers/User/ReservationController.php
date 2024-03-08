<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GeneratePDF;
use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use App\Models\UserEvent;
use Barryvdh\DomPDF\Facade\Pdf;
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
        # check the user if he create this event 

        $is_find = $this->check_user_event($request->event_id, $request->user_id);
        if ($is_find == true) {
            return back()->with('false', 'You are the createur for this event you can\'t reserve place in this event');
        }

        # check the type for event 

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

        #insert into table user_event

        $ticket->user_id = $request->user_id;
        $ticket->event_id = $request->event_id;
        $ticket->ticket_id = $ticket_token;
        $ticket->save();

        # the data for pdf

        $data = [
            'ticket_id' => $ticket->ticket_id,
            'username' => $ticket->user->name,
            'email' => $ticket->user->email,
            'event' => $ticket->event->name,
            'address' => $ticket->event->adress,
            'description' => $ticket->event->description,
            'date_start' => $ticket->event->date_start,
        ];
        if ($ticket->status == 'approved') {
            $pdf = Pdf::loadView('PDF.PDFView', $data)->setPaper('a4', 'landscape');
            return $pdf->download('Youre-Ticket.pdf');
        } else {
            return back()->with('success', $message);
        }
    }
}
