<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-v-for</title>
	<script src="vue.js"></script>
	
</head>
<body>
<div id="app">
  <ul>
    <li v-for="(index,item) in items">
       {{ index }}-{{ item.message }}-{{item}}
    </li>
  </ul>
</div>
<script >
	window.onload = function (argument) {
		new Vue({
		  el: '#app',
		  data: {
		    items: {
		    	a: 1,
		    	b: { message: 'testMessage' },
		    	c: 3
		    }
		  }
		});
	}
	
</script>
</body>
</html>

