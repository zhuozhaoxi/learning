<!DOCTYPE html>
<html>
<head>
	<title>具名路径</title>
	<meta charset="utf-8" />
	<meta name="description" content="在有些情况下，给一条路径加上一个名字能够让我们更方便地进行路径的跳转。">
</head>
<body>
	<div id="app">
		<h1>Hello App!</h1>
		<!-- <a v-link="{ name: 'user', params: { userId: 123 }}">User</a>
			同样，也可以用 router.go() 来切换到该路径：
			router.go({ name: 'user', params: { userId: 123 }}) -->
		<p>
			<a v-link="{ name: 'user', params: { userId: 123 }}">User v-link</a>
			<a href="#" @click.prevent="go">User router.go</a>
		</p>
		<router-view><span slot="slot1">hello something here</span></router-view>
	</div>
	<style type="text/css">
	.v-link-active{
		color: red;
	}
	</style>
	<script src="/js/vue.js"></script>
	<script src="/js/vue-router.min.js"></script>
	<script>
		var router = new VueRouter({
			// history: true,
			// root: '/zx',
			// 只在 HTML5 history 模式下可用
			hashbang: true,
			// 默认值： true,只在 hash 模式下可用
			// 当 hashbang 值为 true 时，所有的路径都会被格式化为以 #! 开头。false时为# 例如 router.go('/foo/bar') 会把浏览器的 URL 设为 example.com/#!/foo/bar 
			linkActiveClass: 'v-link-active',
			// 默认值： "v-link-active"
			// 配置当 v-link 元素匹配路径时需要添加到元素上的 class 。
			// ***只要当前路径以 v-link 的 URL 开头,这个 class 就会被添加到这个元素上。活跃匹配的规则和添加的 class 也可以通过 v-link 的内联选项单独指定。
			// 举例来说，一个带有指令 v-link="/a" 的元素，只要当前路径以 /a 开头，此元素即会被判断为活跃。
			// 更多配置项： http://router.vuejs.org/zh-cn/options.html
// transitionOnLoad
// 默认值： false
// 在初次加载时是否对 <router-view> 处理场景切换效果。默认情况下，组件在初次加载时会直接渲染。
// suppressTransitionError
// 默认值： false
// 当值为 true 时，在场景切换钩子函数中发生的异常会被吞掉。
		})
		var App = Vue.extend({
			methods:{
				go: function () {
					// router.go({ name: 'user', params: { userId: 12344 }})
					router.go('/user/12344')
				}
			}
		})

		router.map({
			'/user/:userId': {
				name: 'user', // 给这条路径加上一个名字
				component: {
					template: '<p>userId : {{ $route.params.userId }}</p>'+
								'<slot name="slot1"></slot>'
				}
		  }
		})
		router.start(App, '#app');
	</script>
</body>
</html>