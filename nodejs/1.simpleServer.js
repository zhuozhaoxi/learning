var http = require("http");
const url = require("url");
const querystring = require("querystring");

http.createServer(function (request, response) {
    // 定义了一个post变量，用于暂存请求体的信息
    var post = '';

    // 通过req的data事件监听函数，每当接受到请求体的数据，就累加到post变量中
    request.on('data', function(chunk){
        post += chunk;
    });

    // 在end事件触发后，通过querystring.parse将post解析为真正的POST请求格式，然后向客户端返回。
    request.on('end', function(){
        console.log("原始拼接完的POST参数：", post);
        post = querystring.parse(post);
        console.log("POST参数：", post);
    });
    console.log("请求方式：",request.method);
    console.log("请求URL：",request.url);
    console.log("GET参数：", url.parse(request.url,true).query);
    // xx.com?name=zx&local=jd
    // url.parse(urlString,bool);  bool => true，将query转换成对象 { name : 'zx', local : 'jd' }， false => 以字符串返回 name=zx&local=jd

    // 发送 HTTP 头部
    // HTTP 状态值: 200 : OK
    // 内容类型: text/plain
    response.writeHead(200, {'Content-Type': 'text/plain'});

    // 发送响应数据 "Hello World"
    response.end('Hello World\n');
}).listen(8888);

// 终端打印如下信息
console.log('Server running at http://127.0.0.1:8888/');