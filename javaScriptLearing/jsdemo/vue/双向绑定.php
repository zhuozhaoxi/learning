<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-双向绑定</title>
	<script src="vue.js"></script>
	
</head>
<body>

<div id="app">
    <p>{{ message }}</p>
    <p>{{ message1 }}</p>
  	<input v-model="message">
</div>
下一个：<a href="3.php">渲染列表</a>
<script >
	window.onload = function (argument) {
		new Vue({
		    el: '#app',
		    data: {
		        message: 'Hello Vue.js!',
		        message1: '1123'
		    }
		});
	}
	
</script>
</body>
</html>

