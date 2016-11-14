define(['jquery'],function ($){
	$('#main').html($('#main').html()+'<br />载入math');
	var add = function (x,y){
		return x+y;
	};
	return {
		add: add
	};
});

// 定义了一个模块,开放了add接口
// define(['xxx','yyy'],function(xxx,yyy){});  如果模块依赖于其他模块


// define多个的，貌似会有问题
// 如果一个模块仅含值对，没有任何依赖，则在define()中定义这些值对就好了：
//Inside file my/shirt.js:
// define({
//     color: "black",
//     size: "unisize"
// });

// 因为这个
// main.js
// require(['math','test'],function(math,test){})
// 这里的test实际上是上面那个,所以尽量不要在一个文件中定义多个define



// 如果一个模块没有任何依赖，但需要一个做setup工作的函数，则在define()中定义该函数，并将其传给define()：
//my/shirt.js now does setup work
//before returning its module definition.
// define(function () {
//     //Do setup work here

//     return {
//         color: "black",
//         size: "unisize"
//     }
// });