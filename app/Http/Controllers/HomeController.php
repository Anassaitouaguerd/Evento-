<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $allCategory = Categories::all();
        $allEvents = Event::all()->where('status', 'approved');
        return view('front-office.User.home', compact('allCategory', 'allEvents'));
    }
    public function dashboard()
    {
        return view('back-office.dashboard');
    }
    public function search(Request $request)
    {
        $allCategory = Categories::all();
        $allEvents = Event::where('name', 'like', '%' . $request->search . '%')
            ->where('category_id', 'like', '%' . $request->filter . '%')
            ->where('status', 'approved')
            ->get();
        return view('front-office.User.home', compact('allEvents', 'allCategory'));
    }
    public function blog_event($id)
    {
        $event = Event::where('id', $id)->first();
        $countEvent = UserEvent::where('event_id', $id)->where('status', 'approved')->count();
        $place_disponible = $event->number_place - $countEvent;
        return view('front-office.User.blog', compact('event', 'place_disponible'));
    }
}