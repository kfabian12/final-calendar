<!DOCTYPE html>
<form class="addEventForm" method="POST" action="/addEvent">
    @csrf
    <div>
        <label for="eventName">Event:</label><br>
        <input type="textbox" id="eventName" name="eventName" required><br>
    </div> 
    <div> 
        <label for="day">Date:</label><br>
        <input type="date" id="day" name="day" required><br>
    </div> 
    <div> 
        <label for="notes">Notes:</label><br>
        <input type="textbox" id="notes" name="notes">
    </div><br>
    <div>
        <label for="categories">Category:</label><br>
        <select id="categories" name="categories">
            <option value="Personal">Personal</option>
            <option value="Work">Work</option>
            <option value="School">School</option>
        </select><br>
    </div>
    <div>
        <label for="startTime">Start Time:</label><br>
        <input type="time" id="startTime" name="startTime" required><br>
        <p>to</p>
        <label for="endTime">End Time:</label><br>
        <input type="time" id="endTime" name="endTime" required><br>
    </div> 
    <button type="submit">add</button>
</form>

