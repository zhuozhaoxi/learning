<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>vue学习-模板解析</title>
	<script src="../vue.js"></script>
</head>
<body>

<div id="replace">
	我会完全消失
</div>

<div id="insert">
	我只是内容会被改变
</div>
<script>
	new Vue({
		el: '#replace',
		template: "<p>我取代了div</p>"
	});
	// 或者 new Vue().$mount('#replace');
	var test = new Vue({
		el: '#insert',
		template: "<p>我改变了div</p>",
		replace: false
	});
	console.log(test.$el);
</script>

<!-- table测试 -->
<table id="table">
	<tbody>
		<tr v-for="tr in items">
			<td v-for="td in tr">{{ td }}</td>
		</tr>
	</tbody>
</table>	
<script>
	window.onload = function (argument) {
		new Vue({
			el:"#table",
			data: {
				items: [
					[1,2,3,4],
					['a','b','c','d'],
					[5,6,7,8],
					['e','f','g','h']
				]
			}
		});
	}
</script>
</body>
</html>