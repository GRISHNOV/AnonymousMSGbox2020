//const cryptico = require("./node_modules/cryptico/lib/cryptico.js");
const cryptico = require("./cryptico_js/cryptico_server_nodejs_lib.js");
const http = require("http");

http.createServer(function(request, response){
    var PassPhrase = "test";
    var Bits = 2048;
    var MattsRSAkey = cryptico.generateRSAKey(PassPhrase, Bits);
    var MattsPublicKeyString = cryptico.publicKeyString(MattsRSAkey);
    response.end(MattsPublicKeyString);
}).listen(3000);