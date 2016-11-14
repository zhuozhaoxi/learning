<!DOCTYPE html>
<html>
<head>
	<title>路由匹配 动态片段</title>
	<meta charset="utf-8" />
	<meta name="description" content="动态片段只能匹配路径中的一个部分，而全匹配片段则基本类似于它的贪心版。例如 /foo/*bar 会匹配任何以 /foo/ 开头的路径。匹配的部分也会被解析为 $route.params 中的一个键值对。">
</head>
<body>
	<div id="app">
		<h1>Hello App!</h1>
		<p>
			这是动态片段的
			<a v-link="{ path: '/foo' }">Go to /foo</a>
			<a v-link="{ path: '/foo/bar' }">Go to /foo/bar</a>
			<a v-link="{ path: '/foo/baz' }">Go to /foo/baz</a>
		</p>
		<p>
			这是全匹配片段的 /foo/*test/bar
			<a v-link="{ path: '/foo/zxczxc/a/b/c/bar' }">Go to /foo/zxczxc/a/b/c/bar</a>
		</p>
		<router-view></router-view>
	</div>

	<template id="main">
		<div class="foo">
			<h2>This is Foo!</h2>
			<p>params: {{ $route.params | json }}</p>
			<!-- $route 获取路由对象 -->
			<router-view keep-alive></router-view>
		</div>
	</template>
	<script src="/js/vue.js"></script>
	<script src="/js/vue-router.min.js"></script>
	<script>
		var router = new VueRouter()

		var Foo = Vue.extend({
				template: '#main'
		})

		var Bar = Vue.extend({
		    template: '<p>This is bar!</p>',
		    data: function () {
		    	return {
		    		num : 1
		    	}
		    },
		    ready: function () {
		    	console.log(this.num);
		    	this.num++;
		    }
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
					'/bar':{
						component: Bar
					},
					'/baz':{
						component: Baz
					},
					// 动态片段
					'/:userName': {
						component:{
							template: 'userName is {{ $route.params.userName }}'
						}
					},
					// '/:post/:get':{
						//一条路径中可以包含多个动态片段，每个片段都会被解析成 $route.params 的一个键值对。{post:xxx,get:xxx}
					// },
					// 全匹配片段(上面的贪心版本)
					'/*test/bar':{
						component:{
							template: 'test value is {{ $route.params.test }}'
						}
					}
					// 当路径同时匹配 动态片段和全匹配片段时，会优先选择动态片段
				}
			}
		})
		router.start(App, '#app');
	</script>
</body>
</html>