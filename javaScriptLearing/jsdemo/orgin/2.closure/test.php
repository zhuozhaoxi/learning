<!DOCTYPE html>
<html>
<head>
	<title>javascript-闭包测试</title>
	<meta charset="utf-8">
</head>
<body>
<script>
	var name1 = "The Window";
　　var object1 = {
　　　　name1 : "My Object",
　　　　getNameFunc : function(){
　　　　　　return function(){
　　　　　　　　return this.name1;
　　　　　　};
　　　　}
　　};
	console.log(object1.getNameFunc()());

	var name2 = "The Window";
　　var object2 = {
　　　　name2 : "My Object",
　　　　getNameFunc : function(){
　　　　　　var that = this;
　　　　　　return function(){
　　　　　　　　return that.name2;
　　　　　　};
　　　　}
　　};
	console.log(object2.getNameFunc()());
</script>
</body>
</html>