<?php

namespace App\Http\Controllers;

use App\Models\Item;
 
use function Laravel\Prompts\alert;
 
class ItemsController extends Controller
{
    public function create() 
    {
        return view('grocery');
    } 
 
    public function store() 
    { 
        $attributes = request()->validate([ 
            'item' => 'required|max:255',
            'categories' => 'required|max:255',
            'quantity' => 'required'
        ]);

        Item::create($attributes);

        alert("Item Added!");

        return redirect('/grocery');
    }

    public function destroy(Item $item) {
        $item->delete();
        return back()->with('success', 'Item Deleted');
    }
}
