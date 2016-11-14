<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>自定义指令</title>
	<script src="vue.js"></script>
</head>
<body>
	<div id="demo" v-my-directive="someValue">
		<input v-model="someValue" lazy></input>
	</div>
	<!-- 
el: 指令绑定的元素。
vm: 拥有该指令的上下文 ViewModel。
expression: 指令的表达式，不包括参数和过滤器。
arg: 指令的参数。
name: 指令的名字，不包含前缀。
modifiers: 一个对象，包含指令的修饰符。
descriptor: 一个对象，包含指令的解析结果。
	 -->
<script>
	Vue.directive('my-directive', {
	// this 返回指令对象
	  bind: function () {
	    // 准备工作
	    // 例如，添加事件处理器或只需要运行一次的高耗任务
	    console.log("ready....... go");
	    console.log(this.vm);		// 输出app
	    console.log(this.el);		// 输出div
	    console.log(this.expression); //someValue
	    console.log(this.arg);		// undefined
	    console.log(this.name);		// my-directive
	    // console.log("modifiers:"+this.modifiers);
	    console.log(this.descriptor); // object
	  },
	  update: function (newValue, oldValue) {
	    // 值更新时的工作
	    // 也会以初始值为参数调用一次
	    console.log("update.......")
	  },
	  unbind: function () {
	    // 清理工作
	    // 例如，删除 bind() 添加的事件监听器
	    console.log("die.......")
	  }
	});
	var app = new Vue({
		el: '#demo',
		data: {
			someValue: ''
		}
	});
</script>
</body>
</html>