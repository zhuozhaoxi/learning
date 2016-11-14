// 主要讲述循环依赖的问题

require(['require','a','b'],function (require,a,b) {
	a.doSomething('sss');
	b('asd');
});
