/* Service Worker中可使用的一些全局变量
self: 表示 Service Worker 作用域, 也是全局变量
caches: 表示缓存
skipWaiting: 表示强制当前处在 waiting 状态的脚本进入 activate 状态
clients: 表示 Service Worker 接管的页面
*/
var cacheStorageKey = 'minimal-pwa-2';  // 缓存名称

var cacheList = [
  '/',
  "index.html",
  "main.css",
  "1.png"
]

self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(cacheStorageKey)
    .then(cache => cache.addAll(cacheList))
    .then(() => self.skipWaiting())
	// 这一段的意思是，  创建一个名为cacheStorageKey的缓存，其中包含了cacheList的所有文件
  )
})
// 调用 self.skipWaiting() 方法是为了在页面更新的过程当中, 新的 Service Worker 脚本能立即激活和生效。


// 1、处理动态缓存
// 网页抓取资源的过程中, 在 Service Worker 可以捕获到 fetch 事件, 可以编写代码决定如何响应资源的请求
self.addEventListener('fetch', function(e) {
  e.respondWith(
    caches.match(e.request).then(function(response) {
      if (response != null) {
		console.log("使用缓存："+e.request.url);
        return response					// 这是一个响应结果的对象
      }
	  console.log("发起请求："+e.request.url);
      return fetch(e.request.url)		// 这是一个promise
    })
  )
})

// caches.keys() 是一个promise对象。 一个获取缓存列表的promise
self.addEventListener('activate', function(e) {
  e.waitUntil(
    Promise.all(
      caches.keys().then(cacheNames => {
		  console.log(cacheNames);
        return cacheNames.map(name => {
          if (name !== cacheStorageKey) {
            return caches.delete(name)			// return promise
          }else{
			return new Promise(function(resolve,reject){
				resolve();
			});
		  }
        })
      })
    ).then(() => {
      return self.clients.claim()
    })
})
// 在新安装的 Service Worker 中通过调用 self.clients.claim() 取得页面的控制权, 这样之后打开页面都会使用版本更新的缓存

