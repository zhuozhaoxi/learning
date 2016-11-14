<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-处理用户输入</title>
	<script src="vue.js"></script>
	
</head>
<body>
<div id="app">
  <p>{{ message }}</p>
  <button v-on:click="reverseMessage">Reverse Message</button>
</div>
下一个：<a href="5.php">条件判断</a>
<script >
	window.onload = function (argument) {
		new Vue({
		  el: '#app',
		  data: {
		    message: 'Hello Vue.js!'
		  },
		  methods: {
		    reverseMessage: function () {
		      this.message = this.message.split('').reverse().join('')
		    }
		  }
		})
	}
	
</script>
</body>
</html>

