<!DOCTYPE html>
<html>
<head>
	<title>vue slot内容分发</title>
	<meta charset="utf-8">
	<script src="../vue.js"></script>
</head>
<body>
<!-- 单个slot -->
<div id="demo1">
	<my-component>parent content</my-component>
</div>
<script>
	Vue.component('my-component',{
		template: 	'<div><h1>my-component content<h1>'+
						'<slot>如果没有分发内容则显示我。</slot>'+
					'</div>',
	});

	new Vue({
		el: '#demo1'
	});
</script>

<!-- 多个slot 具名slot -->
<div id="demo2">
	<my-component2>
		<p slot="one">One Content</p>
		<p slot="two">Two Content</p>
		<p slot="three">Three Content</p>
		<p>Four Content</p>
	</my-component2>
</div>
<script>
	Vue.component('my-component2',{
		// 指定了slot的显示在对应的name位置，找不到对应的name也不会显示在默认的<slot></slot>里面
		template: 	"<div>"+
						"<slot name='Two'></slot>"+
						"<slot name='one'></slot>"+
						"<slot name='five'>asdasczxcas</slot>"+
						"<slot></slot>"+
						"something other"+
					"</div>",
	});
	new Vue({
		el: "#demo2"
	})
</script>
</body>
</html>