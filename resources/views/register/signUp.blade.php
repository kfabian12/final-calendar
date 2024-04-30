<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Register page">
    <meta name="theme-color" content="#444"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Gowun+Batang&family=Oswald:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <x-header/> 
    <section>
        <form method="POST" action="/register">
            @csrf 
            <h1>Register</h1>
            <div> 
                <label for="name">First Name:</label><br>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required>
            </div> 
            <div>
                <label for="email">Email:</label><br>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required>
            </div>
            <div>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" required>
            </div>
            @foreach ($errors->all() as $error)
                <li class="errorList">{{ $error }}</li>
            @endforeach
            <button type="submit">Register</button>
        </form> 
    </section> 
</body>
</html>