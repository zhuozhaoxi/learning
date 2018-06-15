var express = require('express');
var app = express();

app.use(express.static('public'));

//  主页输出 "Hello World"
app.get('/', function (req, res) {
    console.log("主页 GET 请求",req.params);
    res.send('Hello GET');
});

//  POST 请求
app.post('/', function (req, res) {
    //req.query;    // 获取URL的查询参数串
    //req.params    // 获取路由的parameters

    console.log("主页 POST 请求");
    res.send('Hello POST');
});

// 对页面 abcd, abxcd, ab123cd, 等响应 GET 请求
app.get('/ab*cd', function(req, res) {
    console.log("/ab*cd GET 请求");
    res.send('正则匹配');
});

// 返回文件
app.get('/index.htm', function (req, res) {
    res.sendFile( __dirname + "/" + "index.htm" );
});


app.get('/process_get', function (req, res) {
    // 输出 JSON 格式
    var response = {
        "first_name":req.query.first_name,
        "last_name":req.query.last_name
    };
    console.log(response);
    res.end(JSON.stringify(response));
});

app.get('/user/:id', function (req, res) {
    //req.params.id
    res.end( JSON.stringify(req.params.id));
});

var bodyParser = require('body-parser');
// 创建 application/x-www-form-urlencoded 编码解析
var urlencodedParser = bodyParser.urlencoded({ extended: false });
app.post('/process_post', urlencodedParser, function (req, res) {

    // 输出 JSON 格式
    var response = {
        "first_name":req.body.first_name,
        "last_name":req.body.last_name
    };
    console.log(response);
    res.end(JSON.stringify(response));
});


var server = app.listen(8081, function () {

    var host = server.address().address;
    var port = server.address().port;

    console.log("应用实例，访问地址为 http://%s:%s", host, port)

});