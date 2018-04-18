/* Service Worker中可使用的一些全局变量
self: 表示 Service Worker 作用域, 也是全局变量
caches: 表示缓存
skipWaiting: 表示强制当前处在 waiting 状态的脚本进入 activate 状态
clients: 表示 Service Worker 接管的页面
*/

/**
 * Promise 知识补充。
 * .then和.catch方法本身会返回一个Promise对象，所以 支持链式调用。
 * 在.then(fn)中 fn函数返回的结果会作为下一个链式调用的参数， 如果 返回一个Promise对象，则后续的.then.catch链式调用会等待这个Promise返回结果(resolve,reject)
 * 逻辑类似下面:
 * then = function(fn){
 * 		var r = fn();;
 * 		if (typeof r === 'Promise'){
 * 			return r;
 * 		}
 * 		return Promise.resolve(r);
 * }
 * iterable 是一个可迭代对象
 * 关于Promise.all(iterable) 方法返回一个 Promise 实例，此实例在 iterable 参数内所有的 promise 都“完成（resolved）” 或 参数中不包含 promise 时回调完成（resolve）；
 * 如果参数中  promise 有一个失败（rejected），此实例回调失败（rejecte），失败原因的是第一个失败 promise 的结果。 成功，则返回一个包含所有promise 结果的数组
 *
 * 关于Promise.race(iterable) 方法返回一个 Promise 实例， 将iterable中一个完成的结果 作为返回结果
 */
var time = 1;
var cacheStorageKey = 'minimal-pwa-2';  // 缓存名称
console.log('Service Worker',self);
var cacheList = [
  '/',
  "index.html",
  "main.css",
  "1.png"
];

self.addEventListener('install', e => {
	console.log('install');
  	e.waitUntil(
    	caches.open(cacheStorageKey)
    	.then(cache => cache.addAll(cacheList))
    	.then(() => self.skipWaiting())
	// 这一段的意思是，  创建一个名为cacheStorageKey的缓存，其中包含了cacheList的所有文件
  	)
})
// 调用 self.skipWaiting() 方法是为了在页面更新的过程当中, 新的 Service Worker 脚本能立即激活和生效。
// 否则 则必须等待旧的Service Worker关闭，  1、时间到期自动关闭。 2、用户跳转界面或关闭浏览器（关闭浏览器后是否关闭Service Worker是由浏览器自己决定的）


// 1、处理动态缓存
// 网页抓取资源的过程中, 在 Service Worker 可以捕获到 fetch 事件, 可以编写代码决定如何响应资源的请求

self.addEventListener('fetch', function(e) {
	// 优先使用缓存的情况
	/**
  	e.respondWith(
    	caches.match(e.request).then(function(response) {
			if (response != null) {
				console.log("使用缓存：",e.request.url,'时间：',time++);
				return response					// 这是一个响应结果的对象
			}
			console.log("发起请求：",e.request.url,'时间：',time++);
			return fetch(e.request.url)		// 这是一个promise
    	})
  	)
	**/
	// 优先使用网络请求，当网络请求不通时， 使用缓存
	e.respondWith(
		fetch(e.request.url)
		.then(httpRes => {
			if(!httpRes || httpRes.status !== 200 ){		// 请求失败， 返回失败结果
				return httpRes
			}
			// 请求成功，缓存
			var responseClone = httpRes.clone();
			caches.open(cacheStorageKey)
			.then(function (cache) {
				return cache.delete(e.request)
						.then(function() {
							cache.put(e.request, responseClone);
						});
			});

			return httpRes;
		}).catch((err)=>{
			// 网络不通，会走到这里
			//return Promise.resolve(null);
			console.error(err);
			return caches.match(e.request);
		})
	);
})

// caches.keys() 是一个promise对象。 一个获取缓存列表的promise
self.addEventListener('activate', function(e) {
	console.log('Activate event');
//	console.log('Promise all', Promise, Promise.all);

	var cacheDeletePromise = caches.keys().then(cacheNames => {
		console.log('cacheNames',cacheNames, cacheNames.map);
		// 跟下面的对比 这里多了个Promise.all 所以.then self.clients.claim() 会等待这里的缓存删除完毕,
		//then接收到的参数也不一样，这里是[[true,'cache']]。 下面是 [[Promise,Promise]]
		return Promise.all(
			cacheNames.map(name => {
				if(name !== cacheStorageKey){
//					console.log('caches.delete', caches.delete);
					console.log('cache delete name: ', name);
					var deletePromise = caches.delete(name);
					console.log('cache delete result: ', deletePromise);
					return deletePromise;
				}else{
					return Promise.resolve('cache');
				}
			})
		)
	});
	console.log('cacheDeletePromises: ', cacheDeletePromise);

	e.waitUntil(
		Promise.all(
			[cacheDeletePromise]
		).then((r) => {
			console.log('sw end',r);
			return self.clients.claim()
		})
	);
	// claim 通知客户端，由新的Service Worker 接管

	/**
  	e.waitUntil(
    	Promise.all(
			[caches.keys().then(cacheNames => {
				console.log(cacheNames);
				return cacheNames.map(name => {
					if (name !== cacheStorageKey) {
						return caches.delete(name)			// return promise
					}else{
						return Promise.resolve();
					}
				})
		  	})]
		).then(() => {
		  return self.clients.claim()
		})
	)
	**/
})
// 在新安装的 Service Worker 中通过调用 self.clients.claim() 取得页面的控制权, 这样之后打开页面都会使用版本更新的缓存

