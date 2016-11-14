// demo1的另一种写法
// 使用如var $ = require('jquery'),获得模块对象
require.config({
    paths: {
        jquery: 'libs/jquery-1.8.3.min',
        path: 'libs/path'
    }
});

require(['require','jquery','math'],function (require) {
	var $ = require('jquery');
	$('#main').html($('#main').html()+'<br/>载入main');
	var math = require('math')
	var count = 0;
	count = math.add(2,3);
	console.log(count);
});


// 生成相对于模块的URL地址: 你可能需要生成一个相对于模块的URL地址。你可以将"require"作为一个依赖注入进来，然后调用require.toUrl()以生成该URL:
	// var cUrl = require.toUrl('./test');
	// console.log(cUrl);
require(['path'],function (path) {
	console.log(path.cUrl);	// script/t
});


// 控制台调试
// 如果你需要处理一个已通过require(["module/name"], function(){})调用加载了的模块，可以使用模块名作为字符串参数的require()调用来获取它:
// require("module/name").callSomeFunction()
// 注意这种形式仅在"module/name"已经由其异步形式的require(["module/name"])加载了后才有效。只能在define内部使用形如"./module/name"的相对路径。