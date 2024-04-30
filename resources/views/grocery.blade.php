<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Gowun+Batang&family=Oswald:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Grocery List</title>
    <link rel="stylesheet" href="{{ asset('css/groceryStyle.css') }}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
</head>
<body>
    <header>  
        <x-header/>
        <h1>Grocery List</h1>
    </header> 

    <div class="groceryList">  
        <form class="groceryForm" method="POST" action="/addItem">
            @csrf
            <div>
                <label for="item">New Item:</label><br>
                <input type="textbox" id="item" name="item" required><br>
            </div>
            <div>
                <label for="quantity">Quantity:</label><br>
                <input type="number" id="quantity" name="quantity" required><br>
            </div>
            <div>
                <label for="categories">Category:</label><br>
                <select id="categories" name="categories">
                    <option value="Produce">Produce</option>
                    <option value="Baking">Baking</option>
                    <option value="Dairy">Dairy</option>
                    <option value="Bread">Bread</option>
                    <option value="Grains">Grains</option>
                    <option value="Household">Household</option>
                    <option value="Meat">Meat</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Canned Goods">Canned Goods</option>
                    <option value="Frozen Food">Frozen Food</option>
                    <option value="Beverage">Beverage</option>
                </select>
            </div>
            <button type="submit">add</button>
        </form>
        @foreach ($items as $item)
            <div class="groceryItem">
                <i id="star" class="fa fa-star"></i>
                <h2>{{ $item->item }}</h2>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Category: {{ $item->categories }}</p>
                <form method="POST" action="/items/{{ $item->id }}">
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