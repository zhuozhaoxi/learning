<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-class,style绑定</title>
	<script src="vue.js"></script>
	<style type="text/css">
		.border{
			border: 1px solid black;
		}
		.red{
			background-color: red;
		}
		.yellow{
			background-color: yellow;
		}
	</style>
</head>
<body>

<!-- 对象写法 -->
<!-- <div id="app"  class="border" v-bind:class="classObject">
或{ 'red': isA, 'yellow': isB }
 -->
<!-- 数组写法 -->
<!-- <div id="app"  v-bind:class="[classA,classB]">
    asdasdasd
</div> -->
<!-- v-bind:class 指令可以与普通的 class 特性共存： -->


<div id="app" v-bind:style="styleObject">
	123465
</div>
<!-- 数组语法 
	v-bind:style="[styleObjectA, styleObjectB]"
-->	

<!-- 当 v-bind:style 使用需要厂商前缀的 CSS 属性时，如 transform，Vue.js 会自动侦测并添加相应的前缀。 -->
下一个：<a href="11.php">s</a>
<script >
	window.onload = function (argument) {
		new Vue({
		    el: '#app',
		 //    data: {
			//   isA: true,
			//   isB: false
			// }

			data: {
				classA: 'border',
				classB: 'yellow',
				styleObject: {
					color: 'red',
					fontSize: '13px'
				}
			}
		});
	}
	// 也可以在这里绑定一个返回对象的计算属性。这是一个常用且强大的模式。
</script>
</body>
</html>

