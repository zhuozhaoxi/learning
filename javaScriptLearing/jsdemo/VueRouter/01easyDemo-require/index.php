<!DOCTYPE html>
<html>
<head>
	<title>vue路由简单例子</title>
	<meta charset="utf-8" />
</head>
<body>
	<div id="app">
		<h1>Hello App!</h1>
		<p>
			<!-- 使用指令v-link 进行导航 -->
			<a v-link="{path: '/foo'}">Go to Foo</a>
			<a v-link="{path: '/bar'}">Go to Bar</a>
			<a v-link="{path: '/'}">Go to Root</a>
		</p>
		<router-view></router-view>
	</div>

	<script src="/js/require-2.0.js"></script>
	<script>
		require.config({
			baseUrl: '/js',
			paths: {
				'vue-router' : 'vue-router.min'
			},
			shim: {
				'vue-router' : {
					deps : ['vue']
				}
			}
		});
		
		require(['require','vue','vue-router'],function () {
			var Vue = require('vue');
			var VueRouter = require('vue-router');
			Vue.use(VueRouter);

			var Foo = Vue.extend({
			    template: '<p>This is foo!</p>'
			})

			var Bar = Vue.extend({
			    template: '<p>This is bar!</p>'
			})

			var App = Vue.extend({});

			var router = new VueRouter();
			router.map({
				'/': {
					component:{
						template: 'try to click one'
					}
				},
				'/foo':{
					component: Foo
				},
				'/bar':{
					component: Bar
				}
			})
			router.start(App,'#app');
		});
		// var VueRouter = require('vue-router')

		// Vue.use(VueRouter)
	</script>
	
</body>
</html>