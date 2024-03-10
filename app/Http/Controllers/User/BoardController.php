<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\BoardRequest;
use App\Models\UserEvent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index()
    {
        $tickets = UserEvent::where('user_id', session('user')->id)->get();
        return view('front-office.User.boardTickets', compact('tickets'));
    }
    public function generatePDF(BoardRequest $request)
    {
        $data = [
            'ticket_id' => $request->id,
            'username' => $request->user_name,
            'email' => $request->user_email,
            'event' => $request->event_name,
            'address' => $request->address,
            'description' => $request->description,
            'date_start' => $request->date_start,
        ];
        $pdf = Pdf::loadView('PDF.PDFView', $data)->setPaper('a4', 'landscape');
        return $pdf->download('Youre-Ticket.pdf');
    }
}
