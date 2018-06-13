module.exports = function(request, response){
    response.writeHead(404, {"Content-Type": "text/plain"});
    response.write("404 Page Not Found");
    response.end();
};