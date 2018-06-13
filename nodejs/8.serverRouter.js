var http = require('http');
var url = require("url");
var route = require("./route");

function start(router){
    function onRequest(request, response){
        var pathname = url.parse(request.url).pathname;
        console.log("Request for " + pathname + " received")

        router(pathname, request, response);
    }

    http.createServer(onRequest).listen('8888');
    console.log('Server running at http://127.0.0.1:8888/');
}

start(route);
