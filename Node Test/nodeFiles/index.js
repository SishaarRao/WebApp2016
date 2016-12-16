var http = require("http");
http.createServer(function(req, resp){
	resp.write("Happy Wednesday");
	resp.end();
}).listen(3000)
