<!DOCTYPE html>
<html>
<head>
	<title>嵌套路由</title>
	<meta charset="utf-8" />
	<meta name="description" content="嵌套路由和嵌套组件之间的匹配是个很常见的需求，使用 vue-router 可以很简单的完成这点。">
</head>
<body>
	<div id="app">
		<h1>Hello App!</h1>
		<p>
			<a v-link="{ path: '/' }">Go to /</a>
			<a v-link="{ path: '/foo' }">Go to /foo</a>
			<a v-link="{ path: '/foo/bar' }">Go to /foo/bar</a>
			<a v-link="{ path: '/foo/baz' }">Go to /foo/baz</a>
		</p>
		<router-view></router-view>
	</div>

	<template id="main">
		<div class="foo">
			<h2>This is Foo!</h2>
			<p>{{ $route | json }}</p>
			<!-- $route 获取路由对象 -->
			<router-view></router-view>
		</div>
	</template>
	<script src="/js/vue.js"></script>
	<script src="/js/vue-router.min.js"></script>
	<script>
		var router = new VueRouter();

		var Foo = Vue.extend({
				template: '#main'
		});

		var Bar = Vue.extend({
		    template: '<p>This is bar!</p>'
		})

		var Baz = Vue.extend({
		    template: '<p>This is baz!</p>'
		})

		var App = Vue.extend({})

		router.map({
			'/': {
				component: {
					template: 'Root View'
				}
			},
			'/foo': {
				component: Foo,
				isN: 	true,		// 自定义属性
				subRoutes: {
					'/': {
						component:{
							template: 'Default SubView for Foo'
						},
						myname: 'root',	//自定义属性 	当 /foo 被匹配时，$route.myname 的值将会是 root
						isN : false, 	//自定义属性，会覆盖上面的true
					},
					'/bar':{
						component: Bar,
						myname: 'bar',  //自定义属性。当嵌套的路径被匹配时，每一个路径段的自定义字段都会被拷贝到同一个路由对象上

					},
					'/baz':{
						component: Baz
					}
				}
			}
		})
		router.start(App, '#app');
	</script>
</body>
</html>