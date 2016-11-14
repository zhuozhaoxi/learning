<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>vue学习-组件</title>
	<script src="../vue.js"></script>
</head>
<body>
<!-- 与vm.$mount 不同，mount是把没有指定el的vm实例 挂载到某个元素上 -->
<div id="example">
	<my-component></my-component>
</div>

<br /><hr /><br />

<div id="parent">asdasd</div>

<br /><hr /><br />
<div id="test">
	<my-component>被替换</my-component>
	<my-component2>不会被替换</my-component2>
</div>
<script>
	//定义
	var Component = Vue.extend({
		template: "<div>这是一个全局组件</div>"
	});

	//注册,这里是注册在全局
	Vue.component("my-component",Component);

	//创建根实例
	new Vue({
		el:"#example"
	});


// 局部注册的例子
	var Child = Vue.extend({
		template: '<h1>I am child</h1>',
		replace: false
	});

	var Parent = Vue.extend({
		template: "<div><h1>I am parent</h1><my-component2></my-component2></div>",
		components:{
			'my-component2' : Child
		}
	});
	new Parent().$mount("#parent");

	new Vue({
		el: '#test'
	});

// 另外的写法
	// // 全局注册可以这么写
	// Vue.component('my-component',{
	// 	template: '<div>这是一个全局组件</div>'
	// });

	// // 局部注册也可以这么写
	// var Parent = Vue.extend({
	// 	components: {
	// 		'my-component': {
	// 			template: '<div>这是一个局部组件</div>'
	// 		}
	// 	}
	// });
</script>
</body>
</html>