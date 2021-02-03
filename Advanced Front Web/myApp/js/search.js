

function removeFromStorage(btn,id){
    if(localStorage.getItem("savedEvents")){
      const savedEventsStr = localStorage.getItem("savedEvents"); //get the string from web storage
      const savedEvents = JSON.parse(savedEventsStr); //convert the string to JSON
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

function searchEvent() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/events.json', true);
  var matchedEvents = [];

  xhr.onload = function(){
    let input = document.querySelector('#search');
    var eventsList = document.querySelector('#info');
    if (this.status == 200) {
      var events = JSON.parse(this.responseText);
      var output = '';
      if (input.value.length == 0) {
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
      } else {
        eventsList.innerHTML = '';
          for(let i in events){
            if (events[i].location.toLowerCase().indexOf(input.value.toLowerCase()) > -1 || events[i].title.toLowerCase().indexOf(input.value.toLowerCase()) > -1) {
              matchedEvents.push(i);
            }
          }
          for (var i = 0; i < matchedEvents.length; i++) {
            let div = document.createElement('div');
            div.classList.add('col-sm-6');
            let btn = document.createElement('button');
            btn.classList.add('btn','btn-warning');
            btn.textContent = 'Add to Favorites';
            let points = document.createElement('p');
            points.innerHTML = '<img src="'+events[matchedEvents[i]].img_url+'"><br><a href="details.html?id=' +events[matchedEvents[i]].id+ '">Title: '+events[matchedEvents[i]].title+'</a><br>' +
                      'Date: '+events[matchedEvents[i]].date+'<br>' +
                      'Location: '+events[matchedEvents[i]].location+'<br>';
            btn.addEventListener('click', addToStorage(btn, events[matchedEvents[i]].id));
            div.appendChild(points);
            getDistance(events[i], div, newMap, userLat, userLong);
            div.appendChild(btn);
            eventsList.appendChild(div);
          }
      }
    }
  }
  xhr.send();
}

  let input = document.querySelector('#search');
  input.addEventListener('keyup', function(){
    searchEvent();
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
    }
