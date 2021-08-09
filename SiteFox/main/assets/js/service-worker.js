const version = 2;

//importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');
importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js');

if (workbox) {
  console.log(`Yay! Workbox is loaded !`);
} else {
  console.log(`Boo! Workbox didn't load !`);
}

/*workbox.precaching.precacheAndRoute([
  {url: '/login/main/index.html', revision: null },
  {url: '/login/main/board.html', revision: null },
  {url: '/login/main/tpl/_header.html', revision: null },
  {url: '/login/main/tpl/_footer.html', revision: null }
]);*/

workbox.routing.registerRoute(
  ({request}) => request.destination === 'navigate',
  new workbox.strategies.CacheFirst({
	cacheName: 'html'
  })
);

workbox.routing.registerRoute(
  /.*\.json/,
  new workbox.strategies.CacheFirst({
    cacheName: 'json'
  })
);

workbox.routing.registerRoute(
  ({request}) => request.destination === 'script',
  new workbox.strategies.NetworkFirst({
	cacheName: 'js'
  })
);

workbox.routing.registerRoute(
  // Cache style resources, i.e. CSS files.
  ({request}) => request.destination === 'style',
  // Use cache but update in the background.
  new workbox.strategies.StaleWhileRevalidate({
    // Use a custom cache name.
    cacheName: 'css'
  })
);

workbox.routing.registerRoute(
  // Cache image files.
  ({request}) => request.destination === 'image',
  // Use the cache if it's available.
  new workbox.strategies.CacheFirst({
    // Use a custom cache name.
    cacheName: 'image',
    plugins: [
      new workbox.expiration.ExpirationPlugin({
        // Cache only 100 images.
        //maxEntries:100,
        // Cache for a maximum of 24 hours.
        maxAgeSeconds: 24 * 60 * 60,
      })
    ],
  })
);