<?php

namespace App\Http\Controllers;

use App\Models\Event;

use function Laravel\Prompts\alert;
 
class EventsController extends Controller
{ 
    public function create() // index
    {
        return view('calendar');
    } 
 
    public function store() 
    { 
        $attributes = request()->validate([ 
            'eventName' => 'required|max:255',
            'day' => 'required',
            'notes' => 'required|max:255',
            'categories' => 'required',
            'startTime' => 'required',
            'endTime' => 'required'
        ]);

        Event::create($attributes);

        alert("Event Added!");

        return redirect('/calendar');
    }

    public function destroy(Event $event) {
        $event->delete();
        return back()->with('success', 'Event Deleted');
    }
 
    // public function __invoke()
    // {
    //     // $allEvents = [];
 
    //     // $events = ;;
 
    //     // foreach ($events as $event) {
    //     //     $allEvents[] = [
    //     //         'title' => $event->eventName,
    //     //         'start' => $event->day,
    //     //         'startTime' => $event->startTime,
    //     //         'endTime' => $event->endTime,
    //     //     ];
    //     // }

    //     // $users = DB::table('users')->get()->
 
    //     return view('calendar', [
    //         'events' => Event::all()->toJson()
    //     ]);
    // }
}
