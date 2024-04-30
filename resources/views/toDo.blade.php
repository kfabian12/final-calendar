<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Gowun+Batang&family=Oswald:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <title>To Do List</title>
    <link rel="stylesheet" href="{{ asset('css/listStyle.css') }}">
</head>
<body>
    <header>  
        <x-header/>
        <h1>To Do List</h1>
    </header>
   
    <div class="list">
        <form class="listItem" method="POST" action="/addTask">
            @csrf
            <div>
                <label for="task">New Item:</label><br>
                <input type="textbox" id="task" name="task" required><br>
            </div>
            <div>
                <label for="due">Due Date:</label><br>
                <input type="date" id="due" name="due" required><br>
            </div>
            <button type="submit">add</button>
        </form>
        @foreach ($tasks as $task)
            <div class="listItem">
                <i class="fa fa-star"></i>
                <h2>{{ $task->task }}</h2>
                <p>Due date: {{ $task->due }}</p>
                <form method="POST" action="/tasks/{{ $task->id }}">
                    @csrf
                    @method('DELETE')
                    <button>delete</button> 
                </form>
            </div>
        @endforeach
    </div> 
    <x-listFooter/>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>