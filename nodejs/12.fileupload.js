var express = require('express');
var app = express();
var fs = require("fs");

var bodyParser = require('body-parser');
// node.js 中间件，用于处理 JSON, Raw, Text 和 URL 编码的数据

var multer = require('multer');
//  node.js 中间件，用于处理 enctype="multipart/form-data"（设置表单的MIME编码）的表单数据。

app.use(express.static('public'));  // 使静态文件可以被访问
app.use(bodyParser.urlencoded({ extended : false }));
app.use(multer({ dest: '/tmp/'}).array('image'));
app.get('/index.htm', function (req, res) {
    res.sendFile( __dirname + "/" + "12.fileupload.html" );
})

app.post('/file_upload', function (req, res) {

    console.log(req.files[0]);  // 上传的文件信息

    var des_file = __dirname + "/" + req.files[0].originalname;
    fs.readFile( req.files[0].path, function (err, data) {
        fs.writeFile(des_file, data, function (err) {
            if( err ){
                console.log( err );
            }else{
                response = {
                    message:'File uploaded successfully',
                    filename:req.files[0].originalname
                };
            }
            console.log( response );
            res.setHeader('content-type', 'text/html;charset=utf8');
            res.end( JSON.stringify( response ) );
        });
    });
})

var server = app.listen(8081, function () {

    var host = server.address().address
    var port = server.address().port

    console.log("应用实例，访问地址为 http://%s:%s", host, port)

})