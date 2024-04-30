// Set the width of the sidebar to 250px and the left margin of the page content to 250px
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}
    
// Set the width of the sidebar to 0 and the left margin of the page content to 0
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
} 
  
window.onload = setStar();
function setStar() {
  var stars = document.getElementsByClassName('fa-star');
  for (let i = 0; i < stars.length; i++) {
    stars[i].style.color = "#888888";
  }
}

// star or items on to do list
var stars = document.getElementsByClassName('fa-star');
for (let i = 0; i < stars.length; i++) {
  stars[i].addEventListener("click", function () {
    if (stars[i].style.color == "gold") {
      stars[i].style.color = "#888888";
    }
    else {
      stars[i].style.color = "gold";
    } 
  });
}
  
// show dayView when a day is clicked on the calendar  
var allDays = document.getElementsByTagName('td');
for (let i = 0; i < allDays.length; i++) {
  allDays[i].addEventListener("click", function () {
    var popUp = document.getElementById("dayPopUp");
    popUp.style.visibility = 'visible';
  });
}
// close day view
function closeDayView() {
  var dayView = document.getElementById("dayPopUp");
  dayView.style.visibility = 'hidden';
}
 

// show popUp form when addEventBtn is clicked
function openAddEvent() {
  var eventPopUp = document.getElementById("popup-content");
  eventPopUp.classList.toggle("show");
}
// close addEvent popUp
function closeEvent() {
  var eventPopUp = document.getElementById("popup-content");
  eventPopUp.classList.remove("show");
}

// add event
function addEvent() {
  //close popUp
  var eventPopUp = document.getElementById("popup-content");
  eventPopUp.classList.remove("show");
} 


