// 路径配置, 这里的配置不仅在main.js里面有效,在其他的文件也有效(如 math.js)
// 如未显式设置baseUrl，则默认值是加载require.js的HTML所处的位置。如果用了data-main属性，则该路径就变成baseUrl。
require.config({
	// baseUrl: "js/lib",	//基路径是可以自定义的 
    paths: {
        jquery: 'libs/jquery-1.8.3.min',
        // "jquery": "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min",
        test: 'pathtest/test'
    }
});

require(['jquery','math','test'],function ($,math,test) {
	// alert($().jquery);
	$('#main').html($('#main').html()+'<br/>载入main');
	var count = 0;
	count = math.add(2,3);
	test.say(count);
});


// 关于path
// 有时候你想避开"baseUrl + paths"的解析过程，而是直接指定加载某一个目录下的脚本。
// 此时可以这样做：如果一个module ID符合下述规则之一，其ID解析会避开常规的"baseUrl + paths"配置，而是直接将其加载为一个相对于当前HTML文档的脚本：
// 以 ".js" 结束.
// 以 "/" 开始.
// 包含 URL 协议, 如 "http:" or "https:".
