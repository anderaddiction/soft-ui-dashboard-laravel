<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Friend;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Console\Scheduling\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Events::paginate(10);
        return view('events.index', [
            'events' => $events,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $friends = Friend::with('events')->pluck('name', 'id');
        $event = new Events();
        return view('events.create', [
            'event' => $event,
            'friends' => $friends,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $event = Events::create(
            array_merge(
                $request->except(
                    'friend_id'
                ),
            )
        );

        $event->friends()->attach($request->friend_id);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Events::findOrFail($id);
        return view('events.show', [
            'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Events::findOrFail($id);
        $friends = Friend::pluck('name', 'id');
        return view('events.edit', [
            'event' => $event,
            'friends' => $friends,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, string $id)
    {
        $event = Events::findOrFail($id);
        $event->update(
            array_merge(
                $request->except(
                    'friend_id'
                ),
            )
        );

        $event->friends()->sync($request->friend_id);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Events::findOrFail($id);
        $event->friends()->detach();
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
