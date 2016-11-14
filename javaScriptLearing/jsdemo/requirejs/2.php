<!DOCTYPE html>
<html>
<head>
	<title>2、放大模式</title>
	<meta charset="utf-8" />
	<meta name="description" content="放大模式，模块继承或者扩展">
</head>
<body>
<script>
	//  如果一个模块很大，必须分成几个部分，或者一个模块需要继承另一个模块，这时就需要使用放大模式
	var module1 = (function () {
		var _count = 1;
		var sayHello = function () {
			console.log("Hello "+_count);
			_count++;
		}
		return {
			sayHello: sayHello
		}
	})();
	module1.sayHello();

	// 对module扩展.为其添加一个新的方法sayWorld
	// 重复声明不会报错，是合法的，相当于赋值语句
	var module1 = (function (mod) {
		mod.sayWorld = function (argument) {
			console.log("world ");
		};
		return mod;
	})(module1);

	module1.sayWorld();
	// 问题，如何在sayWorld里面使用_count???? 	貌似没有办法


	// 宽放大模式
	// 在浏览器环境中，模块的各个部分通常都是从网上获取的，有时无法知道哪个部分会先加载。如果采用上一节的写法，第一个执行的部分有可能加载一个不存在空对象，这时就要采用"宽放大模式"。
	var module1 = ( function (mod){
　　　　//...
　　　　return mod;
　　})(window.module1 || {});

	module1.sayHello();
	module1.sayWorld();
// 与"放大模式"相比，＂宽放大模式＂就是"立即执行函数"的参数可以是空对象。
</script>
</body>
</html>