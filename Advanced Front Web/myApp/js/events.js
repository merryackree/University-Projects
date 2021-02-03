

function removeFromStorage(btn,id){
    if(localStorage.getItem("savedEvents")){
      const savedEventsStr = localStorage.getItem("savedEvents"); //get the string from web storage
      const savedEvents = JSON.parse(savedEventsStr); //convert the string to JSON
      console.log(savedEvents.indexOf(id))
      if(savedEvents.indexOf(id) > -1){
        let index = savedEvents.indexOf(id);
        savedEvents.splice(index, 1);
        localStorage.setItem("savedEvents",JSON.stringify(savedEvents))
        btn.innerHTML = 'Add to favorites';
      }else{
        console.log('error1');
      }
    }else{
      console.log('error');
    }
}

function addToStorage(btn, id){
  return function(){
    if(localStorage.getItem("savedEvents")){
      const savedEventsStr = localStorage.getItem("savedEvents"); //get the string from web storage
      const savedEvents = JSON.parse(savedEventsStr); //convert the string to JSON
      console.log(savedEvents.indexOf(id))
      if(savedEvents.indexOf(id) > -1){
          removeFromStorage(btn,id);
      }else{
        savedEvents.push(id)
        localStorage.setItem("savedEvents",JSON.stringify(savedEvents))
        btn.innerHTML = 'Remove from favorites';
      }
    }else{
      const savedEvents = [id];
      localStorage.setItem("savedEvents",JSON.stringify(savedEvents))
      btn.innerHTML = 'Remove from favorites';
    }
  }
}



function loadEvent(){
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/events.json', true);
  let eventsList = document.querySelector('#events-list');

  xhr.onload = function(){

    if (this.status == 200) {
      var events = JSON.parse(this.responseText);
      showEvents(events, eventsList);

    }
  }
  xhr.send();
}


function showEvents(events, eventsList){

  eventsList.innerHTML = '';

  for(let i in events){
    let div = document.createElement('div');
    div.classList.add('col-sm-6');
    let btn = document.createElement('button');
    btn.classList.add('btn','btn-warning');
    btn.textContent = 'Add to Favorites';
    let points = document.createElement('p');
    points.innerHTML = '<img src="'+events[i].img_url+'"><br><a href="details.html?id=' +events[i].id+ '">Title: '+events[i].title+'</a><br>' +
              'Date: '+events[i].date+'<br>' +
              'Location: '+events[i].location+'<br>';
    btn.addEventListener('click', addToStorage(btn, events[i].id));
    div.appendChild(points);
    getDistance(events[i], div, newMap, userLat, userLong);
    div.appendChild(btn);
    eventsList.appendChild(div);
  }
}



function findEarliestDate(array,format){
	var minDate,minDateKey;

	for (let j = 0; j < array.length; j++) {
		if (array[j]) {
			minDate = moment(array[j], format);
			minDateKey = j;
		}
	}

	for (var i = 0; i < array.length; i++) {
		let date = moment(array[i], format);
		if (minDate > date) {
			minDate = date;
			minDateKey = i;
		}
	}
	return minDateKey;
}


let category = document.querySelector('#categories');
    category.addEventListener('change', function(){
      if (this.value == 'any') {
        loadEvent();
      } else {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'data/events.json', true);
        let eventsList = document.querySelector('#events-list');
        let value = this.value;
        xhr.onload = function(){

          if (this.status == 200) {
            var events = JSON.parse(this.responseText);
            console.log(value);
              let a = filterByCategory(events, value);
              showEvents(a, eventsList);
          }
        }
      xhr.send();
      }
    });



function filterByCategory(events,value){
  let filteredEvents = [];
  for (let i in events){
    for (var j = 0; j < events[i].category.length; j++) {
      if (events[i].category[j] == value) {
        filteredEvents.push(events[i]);
      }
    }
  }
  return filteredEvents;
}

let btn = document.querySelector('#date-btn');

btn.addEventListener('click', function(event){
			event.preventDefault();

			var xhr = new XMLHttpRequest();
			xhr.open('GET', 'data/events.json', true);
      let eventsList = document.querySelector('#events-list');
      eventsList.innerHTML = '';

			xhr.onload = function(){
				if (this.status == 200) {
					var events = JSON.parse(this.responseText);
					var output = '';

	let	array = [];

		for(let i in events){
			array.push(events[i].date);
		}

		let format = "DD-MM-YYYY"
		let orderedArray = [];

		for (var i = 0; i < array.length; i++) {
			let number = findEarliestDate(array, format);
			orderedArray.push(number);
			delete array[number];
		}

		for (var i = 0; i < orderedArray.length; i++) {

			let j = orderedArray[i];
      let div = document.createElement('div');

      let btn = document.createElement('button');
      btn.classList.add('btn','btn-warning');
      btn.textContent = 'Add to Favorites';
      let points = document.createElement('p');
      points.innerHTML = '<img src="'+events[i].img_url+'"><br><a href="details.html?id=' +events[i].id+ '">Title: '+events[i].title+'</a><br>' +
                'Date: '+events[i].date+'<br>' +
                'Location: '+events[i].location+'<br>';
      btn.addEventListener('click', addToStorage(btn, events[j].id));
      div.classList.add('col-sm-6');
      div.appendChild(points);
      getDistance(events[i], div, newMap, userLat, userLong);
      div.appendChild(btn);
      eventsList.appendChild(div);
		}

		}
		}
		xhr.send();
	});


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
