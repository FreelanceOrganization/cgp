var cacheName = 'hello-pwa';
var filesToCache = [
  '/',
  '/index.php',
  '/css/main.css',
  '/css/login.css',
  '/css/balance.css',
  '/css/common/form.css',
  '/css/common/header.css',
  '/css/common/sidebar.css',
  '/js/mobile.js'
];

/* Start the service worker and cache all of the app's content */
self.addEventListener('install', function(e) {
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.addAll(filesToCache);
    })
  );
});

/* Serve cached content when offline */
self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});
