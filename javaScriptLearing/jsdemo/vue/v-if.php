<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-条件判断</title>
	<script src="vue.js"></script>
	
</head>
<body>

<div id="app">
  	<p v-if="greeting">Hello!</p>
    <p v-else>NO Hello!</p>
</div>
下一个：<a href="6.php">综合</a>
<script >
		var exampleVM2 = new Vue({
			el: '#app',
			data: {
				greeting: true
			}
		});
</script>
</body>
</html>

