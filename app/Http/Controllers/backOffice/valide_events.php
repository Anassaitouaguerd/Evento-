<?php

namespace App\Http\Controllers\backOffice;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class valide_events extends Controller
{

    public function index()
    {
        $allEvents = Event::all()->where('status', 'pending');
        return view('back-office.Valid_events', compact('allEvents'));
    }

    public function rejectEvent(Request $request)
    {
        $event = Event::where('id', $request->id)->first();
        $event->status = 'rejected';
        $event->update();
        return back()->with('success', 'the event rejected success');
    }
    public function approvEvent(Request $request)
    {
        $event = Event::where('id', $request->id)->first();
        $event->status = 'approved';
        $event->update();
        return back()->with('success', 'the event approved success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}