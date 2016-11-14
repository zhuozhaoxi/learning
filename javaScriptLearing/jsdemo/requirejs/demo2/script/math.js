define(['require','jquery'],function (require){
	var $ = require('jquery');
	$('#main').html($('#main').html()+'<br/>载入math');
	var add = function (x,y){
		return x+y;
	};
	return {
		add: add
	};
});