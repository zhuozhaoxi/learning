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
			<h2>This is Foo! </h2>
			<router-view></router-view>
		</div>
	</template>

	<script src="/js/require-2.0.js"></script>
	<script>
		require.config({
			baseUrl: '/js',
			paths: {
				'vue-router' : 'vue-router.min'
			},
			urlArgs: "bust=" +  (new Date()).getTime()
			//  给请求的url资源加上参数。这里加上了时间，调试可以用
		})

		require(['require','vue','vue-router'],function () {
			var Vue = require('vue');
			var VueRouter = require('vue-router');
			Vue.use(VueRouter);

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
					subRoutes: {
						'/': {
							component:{
								template: 'Default SubView for Foo. path:{{ $route.path }}'
							}
						},
						'/bar':{
							component: Bar
						},
						'/baz':{
							component: Baz
						}
					}
				}
			})
			router.start(App, '#app');
		})
	</script>
</body>
</html>