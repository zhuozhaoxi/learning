<!DOCTYPE html>
<html>
<head>
	<title>动态组件加载</title>
	<meta charset="utf-8" />
	<meta name="description" content="多个组件可以使用同一个挂载点，然后动态地在它们之间切换。使用保留的 <component> 元素，动态地绑定到它的 is 特性">
</head>
<body>

<!-- 注册多个组件 -->
<template id="button-component">
	<button>Button</button>	
</template>

<template id="pic-component">
	<img src="xxx" alt="这是一张图片" />
</template>

<template id="input-component">
	<input type="text"></input>
</template>

<template id="p-component">
	<p>{{ myMsg }}<p>
</template>

<div id="app">
	<component :is="currentView" :my-msg="currentView" keep-alive></component>
	<input v-model="currentView"></input>
</div>
<!-- keep-alive 字段 如果把切换出去的组件保留在内存中，可以保留它的状态或避免重新渲染。为此可以添加一个 keep-alive 指令参数 -->
<script src="../vue.js"></script>
<script>
	// 注册组件
	Vue.component('button-component',{
		template: '#button-component'
	});
	Vue.component('pic-component',{
		template: '#pic-component'
	});
	Vue.component('input-component',{
		template: '#input-component'
	});
	Vue.component('p-component',{
		template: '#p-component',
		props: ['myMsg']
	});
	// 实例化
	var app = new Vue({
		el:'#app',
		data: {
			currentView: 'button-component'
		}
	});
</script>
</body>
</html>