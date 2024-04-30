<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Calendar page">
    <meta name="theme-color" content="#444"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Gowun+Batang&family=Oswald:wght@300&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <title>Calendar</title>
    <link rel="stylesheet" href="{{ asset('css/calendarStyle.css') }}">
</head>
<body>   
    <header> 
        <div class="topHeader">
            <x-sideNav/>
            <button class="addEventBtn" id="addEventBtn" onclick="openAddEvent()">+</button>
        </div>
        <div class="addEvent" id="addEvent">
            <div class="popup-content" id="popup-content">
                <button class="closePopup" id="closePopup" onclick="closeEvent()">&times;</button>
                <h1>Add Event</h1>
                <x-popUp/>
            </div>
        </div>
    </header>

    <div class="container-calendar">
        <div id="main">
            <div class="monthYear">
                <button id="previous" onclick="previous()">‹</button>
                <h1 class="monthAndYear" id="monthAndYear"></h1>
                <button id="next" onclick="next()">›</button>
            </div>
            <table cellspacing="0" cellpadding="170" class="table-calendar" id="calendar" data-lang="en">
                <thead id="thead-month">
                    <!-- <tr>
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tues</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>  -->
                </thead>
                <tbody id="calendar-body"> 
                    <!-- <tr>
                        <td data-date="1" data-month="4" data-year="2024" data-month_name="April" class="date-picker">
                            <span>1</span>     // 4/1/2024
                        </td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                    </tr>
                    <tr>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                    </tr> -->
                </tbody>
                <tfoot>
                    <tr><td colspan="7">
                        <label for="month">Jump To: </label>
                        <select id="month" onchange="jump()">
                            <option value=0>Jan</option>
                            <option value=1>Feb</option>
                            <option value=2>Mar</option>
                            <option value=3>Apr</option>
                            <option value=4>May</option> 
                            <option value=5>Jun</option>
                            <option value=6>Jul</option>
                            <option value=7>Aug</option>
                            <option value=8>Sep</option>
                            <option value=9>Oct</option>
                            <option value=10>Nov</option>
                            <option value=11>Dec</option>
                        </select>
                        <select id="year" onchange="jump()"></select>
                    </td></tr>
                </tfoot>
            </table>
        </div>

        <div class="filter">
            <h2>Filter</h2>
            <form>
                <div>
                    <input type="checkbox" id="personal" name="personal" class="filterPersonal">
                    <div class="filterColor"></div>
                    <label for="personal">Personal</label>
                </div><br>
                <div>
                    <input type="checkbox" id="work" name="work" class="filterWork">
                    <div class="filterColor"></div>
                    <label for="work">Work</label>
                </div>
            </form>
        </div>
    </div> 

    <div class="eventList-container">
        <h1>All Events</h1>
        <div class="eventList">
            @foreach ($events as $event)
                <div class="eventListItem">
                    <h2>Date: {{ $event->day }}</h2>
                    <h3>{{ $event->eventName }}</h3>
                    <p>From: {{ $event->startTime }} - {{ $event->endTime }}</p>
                    <p>Category: {{ $event->categories }}</p>
                    <p>Notes: {{ $event->notes }}</p>
                    <form method="POST" action="/events/{{ $event->id }}">
                        @csrf
                        @method('DELETE')
                        <button>delete</button> 
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <x-footer/>

    <script src="{{ asset('js/interactiveCalendar.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>