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
        $user_id = $request->user_id;
        $img = $request->file('image');
        $image_name = $img->getClientOriginalName();
        $image = uniqid() . $image_name;
        $img->move('Uploads/', $image);
        Event::create([
            'image' => $image,
            'user_id' => $user_id,
            'name' => $request->name,
            'description' => $request->description,
            'date_start' => $request->date_start,
            'adress' => $request->address,
            'number_place' => $request->number_place,
            'category_id' => $request->category_id,
            'type' => $request->type,
        ]);
        return redirect('/organisateur/Event/' . $user_id)->with('success', 'Add event with success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $allCategory = Categories::all();
        $myEvents = Event::all()->where('user_id', $id);
        return view('front-office.Organisateure.All_My_events', compact('myEvents', 'allCategory'));
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
        $user_id = $request->user_id;
        $event = Event::where('id', $id)->first();

        # check the request has the image 

        if ($request->hasFile("image")) {
            $oldImage = public_path('Uploads/' . $event->image);

            # delete the old image in the folder Upload

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $img = $request->file('image');
            $image_name = $img->getClientOriginalName();
            $image = uniqid() . $image_name;
            $img->move('Uploads/', $image);
            $event->image = $image;
        }
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date_start = $request->date_start;
        $event->adress = $request->address;
        $event->category_id = $request->category_id;
        $event->user_id = $user_id;
        $event->type = $request->type;
        $event->update();
        return redirect('/organisateur/Event/' . $user_id)->with('success', 'Update event with success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::where('id', $id)->first();
        $user_id = $event->user_id;
        $event->delete();
        return redirect('/organisateur/Event/' . $user_id)->with('success', 'Delete event with success');
    }
}