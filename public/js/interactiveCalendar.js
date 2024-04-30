// create events array
let events = [];
 
let eventNameInput = document.getElementById("eventName");
let eventDateInput = document.getElementById("day");
// // let eventNotesInput = document.getElementById("notes");
// // let eventCategoryInput = document.getElementById("categories");
let eventStartTimeInput = document.getElementById("startTime");
let eventEndTimeInput = document.getElementById("endTime");
 
let eventIdCounter = 1;
 
 
function addEvent() {
    console.log("event")
    let eventName = eventNameInput.value;
    let date = eventDateInput.value;
    // let notes = eventNotesInput.value;
    // let category = eventCategoryInput.value;
    let startTime = eventStartTimeInput.value;
    let endTime = eventEndTimeInput.value;
 
    if (eventName && date && startTime && endTime) {
        let eventId = eventIdCounter++;
 
        events.push(
            {
                id: eventId, 
                title: eventName,
                start: date,
                // notes: notes,
                // category: category,
                startTime: startTime,
                endTime: endTime
            }
        );
        showCalendar(currentMonth, currentYear);
        eventNameInput.value = "";
        eventDateInput.value = "";
        // eventNotesInput.value = "";
        // eventCategoryInput.value = "";
        eventStartTimeInput.value = "";
        eventEndTimeInput.value = "";
    }
}
 

function deleteEvent(eventId) {
    // Find index of event with eventID
    let eventIndex = events.findIndex((event) => event.id === eventId);
 
    if (eventIndex !== -1) {
        // Remove event from events
        events.splice(eventIndex, 1);
        showCalendar(currentMonth, currentYear);
    }
}


function generate_year_range(start, end) {
    let years = "";
    for (let year = start; year <= end; year++) {
        years += "<option value='" +
            year + "'>" + year + "</option>";
    }
    return years;
}


today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");
  
createYear = generate_year_range(1970, 2050);
 
document.getElementById("year").innerHTML = createYear;
 
let calendar = document.getElementById("calendar");
 
let months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

let days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
 
$dataHead = "<tr>";
for (dhead in days) {
    $dataHead += "<th data-days='" + days[dhead] + "'>" + days[dhead] + "</th>";
}
$dataHead += "</tr>";
 
document.getElementById("thead-month").innerHTML = $dataHead;
 
monthAndYear = document.getElementById("monthAndYear");

showCalendar(currentMonth, currentYear);
 

// go to next month
function next() {
    // if december, add 1 to year
    currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;
    showCalendar(currentMonth, currentYear);
}
 

// go to previous month
function previous() {
    // if january, subtract 1 from year
    currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
    currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
    showCalendar(currentMonth, currentYear);
}
 

// jump to specific month and year
function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}
 

function showCalendar(month, year) {
    // return num 0-6, 0=sunday
    let firstDay = new Date(year, month, 1).getDay();
    tbl = document.getElementById("calendar-body");
    tbl.innerHTML = "";
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;
 
    let date = 1;
    for (let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span";
 
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()
                ) {
                    cell.className = "date-picker selected";
                }
 
                // Check if there are events on this date
                if (hasEventOnDate(date, month, year)) {
                    cell.classList.add("event-marker");
                    cell
                    cell.appendChild(createEventTooltip(date, month, year));
                }
 
                row.appendChild(cell);
                date++;
            }
        }
        tbl.appendChild(row);
    }
}
 

function createEventTooltip(date, month, year) {
    let tooltip = document.createElement("div");
    tooltip.className = "event-tooltip";
    let eventsOnDate = getEventsOnDate(date, month, year);
    for (let i = 0; i < eventsOnDate.length; i++) {
        let event = eventsOnDate[i];
        let eventDate = new Date(event.date);
        let eventText = `<strong>${event.title}</strong> - 
            ${event.description} on 
            ${eventDate.toLocaleDateString()}`;
        let eventElement = document.createElement("p");
        eventElement.innerHTML = eventText;
        tooltip.appendChild(eventElement);
    }
    return tooltip;
}
 

function getEventsOnDate(date, month, year) {
    return events.filter(function (event) {
        let eventDate = new Date(event.date);
        return (
            eventDate.getDate() === date &&
            eventDate.getMonth() === month &&
            eventDate.getFullYear() === year
        );
    });
}
 

function hasEventOnDate(date, month, year) {
    return getEventsOnDate(date, month, year).length > 0;
}
 

function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}
 
// call showCalendar when page loads
window.onload = showCalendar(currentMonth, currentYear);
