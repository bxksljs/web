const http = require('http'); 
const fs = require('fs');

http.createServer(function (req, res) { 
   fs.readFile('input.txt', function(err, data) { 
      res.writeHead(200, {'Content-type': 'text/html'}); 
      res.write(data);           
      return res.end(); 
    }); 
 }).listen(8080);