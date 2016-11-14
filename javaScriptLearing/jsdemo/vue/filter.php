<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-过滤器</title>
	<script src="vue.js"></script>
</head>
<body>
<div id="demo">
	<input v-model="name"></input>
	<ul v-for="item in list | queryBy name ">
		<li>{{ item }}</li>
	</ul>
</div>

<script>
	Vue.filter('queryBy',function (value,search) {
		if (search == '') {
			return value;
		}
		var arr = [];
		for (var i = value.length - 1; i >= 0; i--) {
			if ( value[i].toString().toLowerCase().indexOf(search.toString().toLowerCase()) != -1 ) {
				arr.push(value[i]);
			}
		}
		return arr;
	});
	var vm = new Vue({
		el: '#demo',
		data: {
			name: '',
			list: ['bar','baz','foo']
		}
	})
</script>

<div id="demo2">
	<input v-model="name"></input>
	<!-- name作为动态参数 -->
	<ul v-for="item in list | filterBy name in 'name'">
		<li>{{ item | json }}</li>
	</ul>
</div>
<script>
	var vm = new Vue({
		el: '#demo2',
		data: {
			name: '',
			list: [{name: 'bar'},{name:'baz'},{name:'foo'}]
		}
	})
</script>

<!-- 双向过滤 -->
<div id="demo3">
	<input type="text" v-model="input | currencyDisplay"></input><br />
	Model Value: {{input}}
</div>
<script>
	Vue.filter('currencyDisplay', {
		// model -> view
		// 在更新 `<input>` 元素之前格式化值
		read: function(val) {
			return '$'+val.toFixed(2);
		},
		// view -> model
		// 在写回数据之前格式化值
		write: function(val, oldVal) {
			var number = +val.replace(/[^\d.]/g, '');
			return isNaN(number) ? 0 : parseFloat(number.toFixed(2));
		}
	});
	new Vue({
		el: '#demo3',
		data: {
			input: 0
		}
	})
</script>
</body>
</html>

