const screenContainer = document.querySelector('.screenContainer');
const seats = document.querySelectorAll('.row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');

populateUI();
let ticketPrice = 30000;

//Update Count
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.row .seat.selected');
    
    const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));

    localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));


    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    total.innerText = numberWithCommas(selectedSeatsCount * ticketPrice);
}

//get the data from local storage and populate the UI
function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add('selected');
            }
        });
    }
    const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');
}

// Select Toggle
screenContainer.addEventListener('click', (e) => {
    if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
        e.target.classList.toggle('selected');
        updateSelectedCount();
    }
    
});

// numbers formatting
function numberWithCommas(x) {
    x = x.toString();
    var pattern = /(-?\d+)(\d{3})/;
    while (pattern.test(x))
        x = x.replace(pattern, "$1,$2");
    return x;
}

// BUAT MODAL BOX
// getting the modal
var modal = document.getElementById("myModal");

// getting the button
var btn = document.getElementById("myBtn");

// getting the span to close the modal
var span = document.getElementsByClassName("close")[0];

// triggering the click on button
btn.onclick = function() {
    modal.style.display = "block";
}

// triggering the x to close modal
span.onclick = function() {
    modal.style.display = "none";
}

