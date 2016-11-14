<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-渲染列表</title>
	<script src="vue.js"></script>
	
</head>
<body>
<div id="app">
  <ul>
    <li v-for="todo in todos | orderBy 'text' 1">
      {{ todo.text }}
    </li>

    <!-- 对象 v-for -->
    <li v-for='(key,my) in mys'>
      {{key}}-{{ my }}
      <!-- 上述方式取得键名,给对象的键提供一个别名：-->
    </li>
    <!-- 两种一样 -->
    <li v-for='my in mys'>
      {{ $key }}-{{ my }}
    </li>


  </ul>

	<!-- v-for 也可以接收一个整数，此时它将重复模板数次。 -->
    <span v-for="n in 10">{{ n }} </span>
</div>
下一个：<a href="4.php">处理用户输入(事件)</a>
<script >
	window.onload = function (argument) {
		new Vue({
		  el: '#app',
		  data: {
		    todos: [
		      { text: 'Learn JavaScript' },
		      { text: 'Learn Vue.js' },
		      { text: 'Build Something Awesome' }
		    ],
		    mys: {
		    	test1: "a",
		    	test2: "b",
		    	test3: "c"
		    }
		  }
		});
	}
	
</script>
</body>
</html>

