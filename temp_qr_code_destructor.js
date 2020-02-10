// var fs = require("fs");
// const http = require("http");
//
// http.createServer(function(request, response){
//
//     if (request.url === '/favicon.ico') {
//         response.writeHead(200, {'Content-Type': 'image/x-icon'} );
//         response.end();
//         //console.log('favicon requested');
//         return;
//     }
//
//     var url = require('url');
//     var url_parts = url.parse(request.url, true);
//     var query = url_parts.query;
//
//     var temp_qr_code_name = query['qr_code_name'];
//     console.log("processing: " + temp_qr_code_name);
//
//     fs.unlink( "./temp_qr_code_store/" + temp_qr_code_name, function(err){
//         if (err) {
//             console.log(err);
//         } else {
//             console.log("deleted!");
//         }
//     });
//
//     response.end();
// }).listen(3001);

//http://127.0.0.1:3001/?qr_code_name=test.png