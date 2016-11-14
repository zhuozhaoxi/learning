<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-拓展（继承）</title>
	<script src="vue.js"></script>
	
</head>
<body>

<div id="app">
	<input v-model="newTodo" v-on:keyup.enter="addTodo" >
	<ul>
<!-- 双 Mustache 标签将数据解析为纯文本而不是 HTML。为了输出真的 HTML 字符串，需要用三 Mustache 标签： -->
		<li v-for="todo in todos">
			<span>{{ 1 + $index }}. {{ todo.text }}</span>
			<!-- <span>{{{ todo.text }}}</span> -->
			<button v-on:click="removeTodo($index)">X</button>
		</li>
	</ul>
</div>
下一个：<a href="8.php">指令</a>

<script >
	var MyComponent = Vue.extend({
		methods: {
			addTodo: function (){
				var text = this.newTodo.trim();
				if (text) {
					this.todos.push({ text: text });
					this.newTodo = "";
				}
			},
			removeTodo: function (index) {
		      this.todos.splice(index, 1);
		    }
		}
	});
	window.onload = function (argument) {
		var component = new MyComponent({
			el:'#app',
			data: {
				newTodo: '测试数据',
				todos: [
					{ text: '<b>li1</b>' },
					{ text: 'li2' }
				]
			}
		});

		// 将组件挂载在元素上,只当el没指定时生效
		component.$mount('#app1');
	}
	
</script>
</body>
</html>

