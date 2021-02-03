

function loadEvent(){

  var urlParams = new URLSearchParams(window.location.search);
	var id = urlParams.get("id");

  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'data/events.json', true);

  xhr.onload = function(){
    if (this.status == 200) {
      var events = JSON.parse(this.responseText);
      var output = '';
let div = document.querySelector('#info');
for(let i in events){
  if (events[i].id == id) {
    let points = document.createElement('p');
    points.innerHTML = '<img src="'+events[i].img_url+'"><br>Title: '+events[i].title+'</a><br>' +
              'Date: '+events[i].date+'<br>' +
              'Time: '+events[i].time+'<br>' +
              'Location: '+events[i].location+'<br>' +
              'Category: '+events[i].category+'<br>' +
              'Description: '+events[i].description+'<br>' ;

    div.appendChild(points);
    div.appendChild(btn);
  }

}


    }
  }
  xhr.send();
}


loadEvent();
