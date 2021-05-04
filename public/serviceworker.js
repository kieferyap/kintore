// Use a cacheName for cache versioning
var cacheName = 'v1:static';

// During the installation phase, you'll usually want to cache static assets.
self.addEventListener('install', function(e) {
	// Once the service worker is installed, go ahead and fetch the resources to make this work offline.
	e.waitUntil(
		caches.open(cacheName).then(function(cache) {
			return cache.addAll([
				'./assets/css/kintore.css',
				'./assets/css/bootstrap.css',
				'./assets/js/bootstrap.js',
				'./assets/js/kintore.js',
				'./assets/js/jquery.1.12.4.min.js',
				'./assets/js/vue.2.6.12.js',
			]).then(function() {
				self.skipWaiting();
			});
		})
	);
});

// when the browser fetches a URL…
self.addEventListener('fetch', function(event) {
	// … either respond with the cached object or go ahead and fetch the actual URL
	event.respondWith(
		caches.match(event.request).then(function(response) {
			if (response) {
				// retrieve from cache
				return response;
			}
			// fetch as normal
			return fetch(event.request);
		})
	);
});