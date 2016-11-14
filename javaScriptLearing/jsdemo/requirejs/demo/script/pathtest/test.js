define(['jquery'],function ($){
	$('#main').html($('#main').html()+'<br />载入test');
	var say = function (word){
		console.log(word);
	};
	return {
		say: say
	};
});

// 加载的jquery目录 为  script/libs/jquery-1.8.3.min.js