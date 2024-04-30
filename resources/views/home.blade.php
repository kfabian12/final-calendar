<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Home page for calendar/to-do/grocery list">
    <meta name="theme-color" content="#444"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Gowun+Batang&family=Oswald:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/homeStyle.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
    <div class="home">
        <i class="fa fa-home" style="font-size:300px;"></i>
    </div>
    <ul>
        <li><a href="/calendar">Calendar</a></li>
        <li><a href="/toDo">To Do List</a></li>
        <li><a href="/grocery">Grocery List</a></li>
    </ul>

    @auth 
        <div class="homeAuth">
            <p>Welcome, {{ auth()->user()->name }}!</p></li>
            <form method="POST" action="/logout">
                @csrf 
                <button type="submit" class="logout">Log Out</button>
            </form>
        </div>
    @else
        <div class="loginSignup">
            <p><a href="/login">Login</a></p>
            <p>&nbsp;|&nbsp;</p>
            <p><a href="/signUp">Register</a></p>
        </div>
    @endauth

</body>
</html>
