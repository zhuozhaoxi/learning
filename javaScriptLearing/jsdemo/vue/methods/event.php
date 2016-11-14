<!DOCTYPE html lang='zh-CN'>
<html>
<head>
	<meta charset="utf-8" />
	<title>vue学习-事件修饰符</title>
	<meta name="description" content="在事件处理器中经常需要调用 event.preventDefault() 或 event.stopPropagation()。尽管我们在方法内可以轻松做到，不过让方法是纯粹的数据逻辑而不处理 DOM 事件细节会更好。该方法将通知 Web 浏览器不要执行与事件关联的默认动作">
	<script src="../vue.js"></script>
</head>
<body>
<!-- preventDefault()  该方法将通知 Web 浏览器不要执行与事件关联的默认动作
	 stopPropagation() 停止事件冒泡，在当前对象处理完，不再传递到父对象 -->

<!-- 事件修饰符：.prevent 与 .stop -->

<!-- .prevent[="funName"] 可以不调用方法-->
<h1>停止默认动作</h1>
<div id="example">
	<a @click.prevent="doThis" href="http://www.baidu.com">点一下</a>
</div>
<script>
	new Vue({
		el: "#example",
		methods:{
			doThis: function () {
				console.log("跳转？不，prevent不会执行默认事件");
			}
		}
	});
</script>

<!-- form表单提交 -->
<div id="example-3">
	<form action="test.php" @submit.prevent>
		<label for="name">name:</label><input type="text" name="name" />
		<input type="submit" value="submit" />
	</form>
</div>
<script>
	new Vue({
		el: '#example-3'
	})
</script>

<h1>停止冒泡</h1>
<div id="example-2">
	<div name="parent" @click="doThing(myparent)">
		<input type="button" value="没加stop" @click="doThing('mychild')" />
	</div>

	<div name="parent" @click="doThing('myparent')">
		<input type="button" value="加了stop" @click.stop="doThing('mychild')" />
	</div>
</div>
<script>
	new Vue({
		el: "#example-2",
		data: {
			myparent: 'test'
		},
		methods:{
			doThing:function (msg) {
				console.log("do by "+msg);
			}
		}
	});
</script>

<!-- 1.0.16 添加了两个额外的修饰符：

添加事件侦听器时使用 capture 模式
<div v-on:click.capture="doThis">...</div>

只当事件在该元素本身（而不是子元素）触发时触发回调
<div v-on:click.self="doThat">...</div>
 -->
 
<!-- <h1>Capture</h1>
<div id="example-capture" :style="styleObject" @click="say('hi')">
	<input type="button" :value="buttonValue" @click="changeCapture() "/>
</div> -->
<script>
	// new Vue({
	// 	el: "#example-capture",
	// 	data: {
	// 		buttonValue:"setCapture",
	// 		styleObject:{
	// 			width: '100px',
	// 			height: '200px',
	// 			border: '1px solid red'
	// 		}
	// 	},
	// 	methods:{
	// 		say: function (msg) {
	// 			console.log('capture say '+msg);
	// 		},
	// 		changeCapture: function (){

	// 		}
	// 	}
	// })
</script>
</body>
</html>