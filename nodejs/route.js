const path = require("path");
const fs = require("fs");
const publishPath = path.resolve("./public");
const config = {
    '/hello' : './hello'
};

module.exports = function(pathName, request, response){
    if(config[pathName]){
        let m = require(config[pathName]);
        m(request, response);
    }else{
        if(pathName == "/"){
            pathName = "/index.html"
        }
        let mPath = path.join(publishPath, pathName);
        fs.readFile(mPath,function(err,data){
            if (err) {
                let m = require("./notFound");
                m(request, response);
            }else{
                // HTTP 状态码: 200 : OK
                // Content Type: text/plain
                response.writeHead(200, {'Content-Type': 'text/html'});
                // 响应文件内容
                response.write(data.toString());
                response.end();
            }
        });
    }
};