<!DOCTYPE html>
<html>
<head>
	<title>javascript-闭包学习</title>
	<meta charset="utf-8">
</head>
<body>
<script>
// // 一方面，函数内部可以直接读取全局变量。
// 	var n=999;
// 　　function f1(){
// 　　　　console.log(n);
// 　　}
// 　　f1(); // 999
// // 另一方面，在函数外部自然无法读取函数内的局部变量
// 	function f2(){
// 　　　　var n2=999;
// 　　}
// 　　console.log(n2); // error
</script>
<!-- 闭包：如何从外部读取局部变量 -->
<!-- 正常办不到，变通，在函数内部在定义一个函数 -->
<script>
	function f1(){
　　　　var n=999;
　　　　function f2(){
			n--;
			console.log(n); // 999
　　　　}
		return f2;
　　}
	var result = f1();
	result();
// 上述代码，f2包括在函数f1内部，f1内部的所有局部变量对f2都是可见的
// 其中f2就是闭包.
// 闭包可以用在许多地方。它的最大用处有两个，一个是前面提到的可以读取函数内部的变量，另一个就是让这些变量的值始终保持在内存中。
</script>
</body>
</html>