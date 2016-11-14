<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-指令v-xx</title>
	<script src="vue.js"></script>
	
</head>
<body>
<!--我们想切换多个元素呢？此时我们可以把一个 <template> 元素当做包装元素,并在上面使用 v-if，最终的渲染结果不会包含它
<template v-if="ok">
  <h1>Title</h1>
  <p>Paragraph 1</p>
  <p>Paragraph 2</p>
</template> -->
<div id="app">
    <p v-if="test1">zxc </p>
    <!-- 不存在elseif -->
    <p v-else>zxc2</p>
    <p v-if="test2">asd </p>
    <p v-else>asd2</p>

    <!--
    v-bind:href="url" 指令用于响应地更新 HTML 特性
	缩写 :href="url"

    v-on 指令，它用于监听 DOM 事件
    v-on:click="doSomething"
    缩写 @click="doSomething"
    -->
</div>
下一个：<a href="9.php">计算属性</a>
<script >
	window.onload = function (argument) {
		new Vue({
	    el: '#app',
	    data: {
	        test1: false,
	        test2: true
	    }
	});
	}
</script>
</body>
</html>

