<!DOCTYPE html>
<html>
<head>
	<title>3、输入全局变量，保持模块的独立性</title>
	<meta charset="utf-8" />
</head>
<body>
<script>
// 	六、输入全局变量
// 独立性是模块的重要特点，模块内部最好不与程序的其他部分直接交互。
// 为了在模块内部调用全局变量，必须显式地将其他变量输入模块。
　　var module1 = (function ($, YAHOO) {
　　　　//...
　　})(jQuery, YAHOO);
// 上面的module1模块需要使用jQuery库和YUI库，就把这两个库（其实是两个模块）当作参数输入module1。这样做除了保证模块的独立性，还使得模块之间的依赖关系变得明显。这方面更多的讨论，参见Ben Cherry的著名文章《JavaScript Module Pattern: In-Depth》。
// 这个系列的第二部分，将讨论如何在浏览器环境组织不同的模块、管理模块之间的依赖性。
</script>
</body>
</html>