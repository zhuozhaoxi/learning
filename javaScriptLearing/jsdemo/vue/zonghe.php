<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-综合</title>
	<script src="vue.js"></script>
	
</head>
<body>

<div id="app">
	<input v-model="newTodo" v-on:keyup.enter="addTodo" >
	<ul>
		<li v-for="todo in todos">
			<span>{{ todo.text }}</span>
			<button v-on:click="removeTodo(this)">X</button>
		</li>
	</ul>
</div>
下一个：<a href="7.php">拓展（继承）</a>
<script >
	window.onload = function (argument) {
		new Vue({
			el: '#app',
			data: {
				newTodo: '测试数据',
				todos: [
					{ text: 'li1' },
					{ text: 'li2' }
				]
			},
			methods: {
				addTodo: function (){
					var text = this.newTodo.trim();
					if (text) {
						this.todos.push({ text: text });
						this.newTodo = "";
						// 如果要改变数组的值 
						// this.todos.$set(0,{ text: text });	OK
						// this.todos[0] = {text:asd};是不行的
					}
				},
				removeTodo: function (index) {
			      this.todos.splice(index, 1);
			    }
			}
		});
	}
	
</script>
</body>
</html>

