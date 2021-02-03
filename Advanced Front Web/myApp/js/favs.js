

function removeFromStorage(id, div){
    return function(){
    if(localStorage.getItem("savedEvents")){
      const savedEventsStr = localStorage.getItem("savedEvents"); //get the string from web storage
      const savedEvents = JSON.parse(savedEventsStr);
      if(savedEvents.indexOf(id) > -1){
        let index = savedEvents.indexOf(id);
        savedEvents.splice(index, 1);
        localStorage.setItem("savedEvents",JSON.stringify(savedEvents));
        div.innerHTML = '';
      }else{
        console.log('error1');
      }
    }else{
      console.log('error');
    }
  }
}



function loadEvent(){
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/events.json', true);
  xhr.onload = function(){

    if (this.status == 200) {
      var events = JSON.parse(this.responseText);
      showFavourites(events);
    }
  }
  xhr.send();

}


function showEvents(events, div){

  for(let i in events){
    let days = moment(events[i].date, "DD-MM-YYYY").fromNow();
    let eventsList = document.createElement('div');
    eventsList.classList.add('col-sm-6');
    let btn = document.createElement('button');
    btn.classList.add('btn','btn-warning');
    btn.textContent = 'Remove from favorites';
    let points = document.createElement('p');
    points.innerHTML = '<img src="'+events[i].img_url+'"><br><a href="details.html?id=' +events[i].id+ '">Title: '+events[i].title+'</a><br>' +
              'Date: '+events[i].date+' ('+days+')<br>' +
              'Location: '+events[i].location+'<br>';

    eventsList.appendChild(points);
    getDistance(events[i], eventsList, newMap, userLat, userLong);
    eventsList.appendChild(btn);
    btn.addEventListener('click', removeFromStorage(events[i].id, eventsList));

    div.appendChild(eventsList);

  }

}

function showFavourites(events){

  let container = document.querySelector('#events');
  if(localStorage.getItem("savedEvents")){

    const savedEventsStr = localStorage.getItem("savedEvents");
    const savedEvents = JSON.parse(savedEventsStr);
    favEvents = [];
    for (i in events){
      if (savedEvents.indexOf(events[i].id) > -1) {
        favEvents.push(events[i])
      }
    }

    showEvents(favEvents, container);

  } else {
    let newP = document.createElement('p');
    newP.textContent = "You don't have favorite events";
    container.appendChild(newP);
  }
}



var newMap, userLat, userLong;

    function initMap(lat,long) {

	    myMap = L.map('map').setView([lat, long], 15);
      newMap = myMap;
    }

    function itWorks(position)
    {
    	let latitude = position.coords.latitude;
      userLat = latitude;
    	let longitude = position.coords.longitude;
      userLong = longitude;
    	console.log('latitude: '+latitude);
    	console.log('longitude: '+longitude);
      let map = initMap(latitude,longitude);

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
    	getUserPosition();
    }

    init();


  function getDistance(events, div, map, lat, long){
        var coordinates = events.coordinates;
        let meters = map.distance([lat, long], coordinates);
        let miles = meters / 1609.34;
        let eventDistance = document.createElement('p');
        eventDistance.innerHTML = 'Distance: '+ miles.toFixed(2) + ' miles';
        div.appendChild(eventDistance);
        console.log(miles);
    }
