define('./main',['./require','./test'],function (require,exports,module) {
	console.log('main.js入口');
	console.log('id:'+module.id);
	// 改成 './main',[],function 不行，依赖为空，而下面加载了require.js文件
	var T = require('./require');
	// require执行完后返回的结果就是exports接口对象
	var t = new T('这是Require对象');
	t.say();
	exports.foo = 'bar';
	exports.test = function(){
		console.log('test');
	};

	var testString = require('./test');
	console.log('testString:'+testString);
	console.log('main出口');
});

// define define(id?, deps?, factory){}
// id 表示模块标识，怎么使用
// deps 是模块依赖
// 上述两个省略时，将通过构建工具自动生成。
// deps 如果没省略，factory内使用到的所有require('xxxa'）都需要写进去
// id 省略时，默认是文件路径

define('./test',"lalalalalalalalal 载入test"
);


// 关于require 
// require 只接受字符串直接量作为参数, 不能是数组，也不能是公式如"MY-MODULE".toLowerCase()，"my-" + "module"

// 关于require.async
// 用来在模块内部异步加载一个或多个模块。
//  require.async('./b', function(b) {
//     b.doSomething();
//   });
//  // 异步加载多个模块，在加载完成时，执行回调
//   require.async(['./c', './d'], function(c, d) {
//     c.doSomething();
//     d.doSomething();
//   });