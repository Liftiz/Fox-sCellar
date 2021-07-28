/*const staticCaheName ="cache-v1";
const assets =["/", "/index.php"];

// ajout de fichiers en cache
self.addEventListener("install", (e) =>{
    e.waintUntil(
        caches.open(staticCaheName).then((cache) =>{
            cache.addAll(assets);
        })
    );
});*/

importScripts('https://storage.googleapis.com/workbox-cdn/releases/6.1.5/workbox-sw.js');

