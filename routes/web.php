<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TasksController;
use App\Models\Event;
use App\Models\Item;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/calendar', function () {
    return view('calendar', [
        'events' => Event::all()
    ]);
});

// Route::get('/calendar/{day}', function (Day $day) {
//     return view('dayView', [
//         'event' => Event::where('day', $day)
//     ]);
// });

Route::get('/toDo', function () {
    return view('toDo', [
        'tasks' => Task::all()
    ]);
});

Route::get('/grocery', function () {
    return view('grocery', [
        'items' => Item::all()
    ]);
});

Route::get('/login', function () {
    return view('sessions.login');
});
 
Route::get('/signUp', function () {
    return view('register.signUp'); 
}); 

// Route::get('/calendar', [EventsController::class, 'index']);
 
Route::get('addEvent', [EventsController::class, 'create']);
Route::post('addEvent', [EventsController::class, 'store']);
Route::delete('events/{event}', [EventsController::class, 'destroy']);

// Route::get('/calendar', [EventsController::class, '__invoke']);

Route::get('addItem', [ItemsController::class, 'create']);
Route::post('addItem', [ItemsController::class, 'store']);
Route::delete('items/{item}', [ItemsController::class, 'destroy']);

Route::get('addTask', [TasksController::class, 'create']);
Route::post('addTask', [TasksController::class, 'store']);
Route::delete('tasks/{task}', [TasksController::class, 'destroy']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');
 

