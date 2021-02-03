
//when the service worker is installed cache the assets
self.addEventListener('install', function(e) {
 e.waitUntil(
   caches.open('studEvents PWA').then(function(cache) {
     return cache.addAll([
       './',
       './index.html',
       './favs.html',
       './search.html',
       './details.html',
       './js/index.js',
       './js/events.js',
       './js/details.js',
       './js/map.js',
       './js/favs.js',
       './js/search.js',
       './css/style.css'
     ]);
   })
 );
});

//when the app makes a request, serve relevant files from cache
self.addEventListener('fetch', function(e) {
  console.log(e.request.url);
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});
