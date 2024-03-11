<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Event;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $allCategory = Categories::all();
        $allEvents = Event::where('status', 'approved')->simplePaginate(4);
        return view('front-office.User.home', compact('allCategory', 'allEvents'));
    }
    public function dashboard()
    {
        $users = User::all()->count();
        $app_events = Event::where('status', 'approved')->count();
        $rej_events = Event::where('status', 'rejected')->count();
        $categories = Categories::all()->count();
        $reservations = UserEvent::all()->count();
        return view('back-office.dashboard', compact('users', 'categories', 'app_events', 'rej_events', 'reservations'));
    }
    public function search(Request $request)
    {
        $allCategory = Categories::all();
        $allEvents = Event::where('name', 'like', '%' . $request->search . '%')
            ->where('category_id', 'like', '%' . $request->filter . '%')
            ->where('status', 'approved')
            ->simplePaginate(4);
        return view('front-office.User.home', compact('allEvents', 'allCategory'));
    }
    public function blog_event($id)
    {
        $event = Event::where('id', $id)->first();
        $countEvent = UserEvent::where('event_id', $id)->where('status', 'approved')->count();
        $place_disponible = $event->number_place - $countEvent;
        return view('front-office.User.blog', compact('event', 'place_disponible'));
    }
    public function dash_organisateur()
    {
        $user_id = session('user')->id;
        # get organizer events
        $events = Event::where('user_id', $user_id)->count();
        # get organizer reservations
        $reservations = UserEvent::where('user_id', $user_id);
        # get organizer approved reservations
        $app_reservations = $reservations->where('status', 'approved')->count();
        # get organizer rejected reservations
        $rej_reservations = $reservations->where('status', 'rejected')->count();
        # get organizer pending reservations
        $pend_reservations = $reservations->where('status', 'pending')->count();

        return view('front-office.Organisateure.dash_organisateur', compact('events', 'app_reservations', 'rej_reservations', 'pend_reservations'));
    }
}