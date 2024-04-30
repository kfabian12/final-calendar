<?php

namespace App\Http\Controllers;

use App\Models\User;

class RegisterController extends Controller
{
    public function create() 
    { 
        return view('register.signUp');
    } 

    public function store() 
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::create($attributes);

        auth()->login($user); 

        return redirect('/')->with('success', 'Your account has been created');
    }
}
