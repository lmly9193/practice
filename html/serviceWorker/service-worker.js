self.addEventListener('install', function (e) {
    e.waitUntil(
        // version1 為 Service-Worker 版本，請自己判斷命名。
        caches.open('version1').then(function (cache) {
            return cache.addAll(
                // 靜態文件快取列表
                [
                    '/index.html',
                    'assets/css/main.css',
                    'assets/css/fontawesome-all.min.css',
                    'assets/js/jquery.min.js',
                    'assets/js/browser.min.js',
                    'assets/js/breakpoints.min.js',
                    'assets/js/main.js'
                ]
            );
        })
    );
});

self.addEventListener('fetch', function (e) {
    console.log(e.request.url);
    e.respondWith(
        caches.match(e.request).then(function (response) {
            return response || fetch(e.request);
        })
    );
});