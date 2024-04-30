<!DOCTYPE html>
<div class="day" id="dayPopUp">
    <button class="closeDayView" id="closeDayView" onclick="closeDayView()">&times;</button>
    <!-- <h1>No events</h1> -->
    <div>
        <h1>Day: {{ $event->day }}</h1>
        <a href="/calendar">&times;</a>
    </div>
    <div>
        <h2>{{ $event->eventName }}</h4>
        <p>From {{ $event->startTime }}am - {{ $event->endTime }}pm</p>
    </div>
    <p>Category: {{ $event->category }}</p>
    <p>Notes: {{ $event->notes }}</p>
    <!-- <button>edit</button> -->
</div>
<script src="{{ asset('js/app.js') }}"></script>
 