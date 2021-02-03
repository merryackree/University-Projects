

var urlParams = new URLSearchParams(window.location.search);
var id = urlParams.get("id");
var xhr = new XMLHttpRequest();
xhr.open('GET', 'data/events.json', true);

xhr.onload = function(){
	if (this.status == 200) {
		var events = JSON.parse(this.responseText);

		for(let i in events){
		  if (events[i].id == id) {
		    getMap(events[i]);
		  }
		}
	}
}

xhr.send();




function getMap(events){

var coordinates = events.coordinates;
console.log(events.coordinates);

const mapEvents=[
	{
		"type": "Feature",
		"geometry": {
			"type": "Point",
			"coordinates": events.coordinates
		},
		"properties": {
			"name": events.title,
			"date": events.date,
			"time": events.time,
			"description":events.description
		}
	}
];


let infoDiv = document.querySelector('#info');
let nameDiv;
let descDiv;


function initMap(lat, long){
	myMap = L.map('map').setView([lat, long], 15);

	L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	 	attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
	    maxZoom: 18
	 }).addTo(myMap);

	 const mark = L.marker([lat, long]).addTo(myMap);
	 mark.bindPopup('You are here').openPopup();
   let parag = document.createElement('p');

	 mapEvents.forEach( function(elem){


		 let marker = L.marker([elem.geometry.coordinates[0], elem.geometry.coordinates[1]]).addTo(myMap);
		 marker.bindPopup(elem.properties.name).openPopup();
		 marker.addEventListener('click', function(){
			 parag.textContent = '';
			 parag.innerHTML = '<p><b>' + elem.properties.name + '</b></p>' + '<p> ' + elem.properties.description + '</p>';
			 infoDiv.appendChild(parag);
		 });
	 });

	 myMap.fitBounds([
		 coordinates,
		[lat, long]
]);

let meters = myMap.distance([lat, long], coordinates);
let miles = meters / 1609.34;
let eventDistance = document.createElement('p');
eventDistance.innerHTML = 'Distance: '+ miles.toFixed(2) + ' miles';
infoDiv.appendChild(eventDistance);
console.log(miles);

}


function itWorks(position)
{
	let latitude = position.coords.latitude;
	let longitude = position.coords.longitude;
	console.log('latitude: '+latitude);
	console.log('longitude: '+longitude);
	initMap(latitude, longitude);
}

function itDoesntWork(error)
{
	console.log('There is an error '+error);
}

function getUserPosition()
{
    navigator.geolocation.getCurrentPosition(itWorks, itDoesntWork);
}

function init()
{

	infoDiv = document.querySelector("#info");
	nameDiv = document.querySelector("#eventTitle");
	descDiv = document.querySelector("#description");
	getUserPosition();


}

init()
}
