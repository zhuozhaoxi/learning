<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>自定义指令</title>
	<script src="../vue.js"></script>
</head>
<body>
	<div id="demo" v-demo:hello.a.b="msg"></div>
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
	Vue.directive('demo', {
	  bind: function () {
	    console.log('demo bound!');
	    console.log(this.modifiers)
	  },
	  update: function (value,v) {
	    this.el.innerHTML =
	      'name - '       + this.name + '<br>' +
	      'expression - ' + this.expression + '<br>' +
	      'argument - '   + this.arg + '<br>' +
	      'modifiers - '  + JSON.stringify(this.modifiers) + '<br>' +
	      'value - '      + value + '<br>' +
	      'va - '      + v
	  }
	})
	var demo = new Vue({
	  el: '#demo',
	  data: {
	    msg: 'hello!'
	  }
	})
</script>
</body>
</html>