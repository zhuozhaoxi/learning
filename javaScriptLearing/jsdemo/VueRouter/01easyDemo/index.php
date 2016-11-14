<!DOCTYPE html>
<html>
<head>
	<title>vue路由简单例子</title>
	<meta charset="utf-8" />
	<script src="/js/vue.js"></script>
	<script src="/js/vue-router.min.js"></script>
</head>
<body>
	<div id="app">
		<h1>Hello App!</h1>
		<p>
			<!-- 使用指令v-link 进行导航 -->
			<a v-link="{path: '/foo'}">Go to Foo</a>
			<a v-link="{path: '/bar'}">Go to Bar</a>
			<a v-link="{path: '/foobar'}">Go to Bar</a>
		</p>
		<a href="s"></a>
		<router-view></router-view>
	</div>
	<p id="test">for test</p>
	<script>
		// 定义组件
		var Foo = Vue.extend({
		    template: '<p>This is foo!{{ msg }}</p>',
		    data: function () {
		    	return {
		    		msg : 'created by zx'
		    	}
		    }
		})

		var Bar = Vue.extend({
		    template: '<p>This is bar!</p>'
		})

		//  这个显示不出来的，路由对象需要是未实例化的可复用的构造器组件。而不是绑定某个确定元素的实例对象
		var FooBar = new Vue({
			el : '#test',
			data:{
				msg: 'something'
			}
		})

		// 路由器需要一个根组件。
		// 出于演示的目的，这里使用一个空的组件，直接使用 HTML 作为应用的模板
		var App = Vue.extend({})

		// 创建一个路由器实例
		// 创建实例时可以传入配置参数进行定制，为保持简单，这里使用默认配置
		var router = new VueRouter()

		// 定义路由规则
		// 每条路由规则应该映射到一个组件。这里的“组件”可以是一个使用 Vue.extend
		// 创建的组件构造函数，也可以是一个组件选项对象。
		// 稍后我们会讲解嵌套路由
		router.map({
			'/':{
				component: {
					template: 'choose one you like1'
				}
				// Vue.extend({
				// 	template
				// })
			},
		    '/foo': {
		        component: Foo
		    },
		    '/bar': {
		        component: Bar
		    },
		    '/foobar': {
		        component: FooBar
		    }
		})

		// 现在我们可以启动应用了！
		// 路由器会创建一个 App 实例，并且挂载到选择符 #app 匹配的元素上。
		router.start(App, '#app')
	</script>
</body>
</html>