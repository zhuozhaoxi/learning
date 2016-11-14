<!DOCTYPE html>
<html>
<head>
	<title>1、基础</title>
	<meta charset="utf-8" />
</head>
<body>
<script>
	var module1 = new Object({
　　　　_count : 0,
　　　　m1 : function (){
　　　　　　this._count = this._count - 1;
			console.log(this._count);
　　　　},
　　　　m2 : function (){
　　　　　　this._count = this._count + 1;
			console.log(this._count);
　　　　}
　　});
	// 普通的对象写法
	module1.m1();	//-1
	module1.m2();	//0
	// 这样的写法会暴露所有模块成员，内部状态可以被外部改写
	module1._count = 5;
	module1.m1();	//4
	module1.m2();	//5


	// 用这种
	// 使用"立即执行函数"（Immediately-Invoked Function Expression，IIFE），可以达到不暴露私有成员的目的。
	var module2 = (function () {
		var _count = 0;
		var m1 = function () {
			_count--;
			console.log(_count);
		}
		var m2 = function () {
			_count++;
			console.log(_count);
		}

		return {
			m1: m1,
			m2: m2
		}
	})()

	module2.m1();	//-1
	module2.m2();	//0
	console.info(module2._count);	//undefined
	// module2._count = 5;	// 这里会给modeule2新加一个_count变量，但是不会影响到m1,m2函数内的_count值
	module2.m1();	//-1
	module2.m2();	//0
</script>
</body>
</html>