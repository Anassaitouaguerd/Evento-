<?php

namespace App\Http\Controllers\Organisateur;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Categories;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }
    public function index_add()
    {
        $allCategory = Categories::all();
        return view('front-office.Organisateure.Events', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'adress' => $request->adress,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
        ]);
        return redirect('/organisateur/Event')->with('success', 'Add event with success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $myEvents = Event::all()->where('user_id', $id);
        return view('front-office.Organisateure.All_My_events', compact('myEvents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::where('id', $id)->first();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date_start = $request->date_start;
        $event->adress = $request->adress;
        $event->category_id = $request->category_id;
        $event->user_id = $request->user_id;
        $event->update();
        return redirect('/organisateur/Event')->with('success', 'Update event with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::where('id', $id)->first();
        $event->delete();
        return redirect('/organisateur/Event')->with('success', 'Delete event with success');
    }
}
