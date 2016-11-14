<!DOCTYPE html>
<html lang='zh-CN'>
<head>
	<meta charset="utf-8" />
	<title>vue学习-方法与事件处理</title>
	<script src="../vue.js"></script>
</head>
<body>
<!-- v-on: => @ -->
<h1>不带参</h1>
<div id="example">
	<button @click="greet">Greet</button>
</div>
<script>
	var vm = new Vue({
				el: '#example',
				data: {
					name: "Vue.js"
				},
				methods:{
					greet: function (event) {
						console.log("Hello "+this.name+"!");
						console.log(event.target.tagName);
					}
				}
			});
	vm.greet();// 也可以调用
</script>

<!-- 带参数的使用方式 -->
<h1>带参</h1>
<div id="example-2">
	<button @click="say('Hi',$event)">Say Hi</button>
	<button @click="say('What',$event)">Say What</button>
</div>
<script>
	new Vue({
		el: "#example-2",
		methods:{
			say:function(msg,event){
				console.log(msg);
				console.log(event.target.tagName);
			}
		}
	})
</script>
</body>
</html>