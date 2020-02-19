const cryptico = require("./cryptico_js/cryptico_server_nodejs_lib.min.js");
const http = require("http");

console.log("(!!!)cryptico server start work => localhost:300");

http.createServer(function(request, response){

    if (request.url === '/favicon.ico') {
        response.writeHead(200, {'Content-Type': 'image/x-icon'} );
        response.end();
        //console.log('favicon requested');
        return;
    }

    //console.log("Url: " + request.url);
    //console.log("Request type: " + request.method);
    //console.log("User-Agent: " + request.headers["user-agent"]);
    //console.log("All headers:");
    //console.log(request.headers);

    var url = require('url');
    var url_parts = url.parse(request.url, true);
    var query = url_parts.query;

    var user_password = query['user_password'];
    console.log("(...)processing for client with password: " + user_password);

    var PassPhrase = user_password;
    var Bits = 2048;
    var RSAkeyPair = cryptico.generateRSAKey(PassPhrase, Bits);
    var RSApublicKeyString = cryptico.publicKeyString(RSAkeyPair);

    response.end(RSApublicKeyString);
    console.log("(OK)complete, RSA pair created!");
}).listen(3000);