// Import the 'http' module to create an HTTP server
const http = require('http');

// Define the hostname and port where the server will listen
const hostname = '127.0.0.1'; // localhost
const port = 3000; // You can choose any available port

// Create an HTTP server
const server = http.createServer((req, res) => {
  // Set the response HTTP header with a status code and content type
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');

  // Write the response body
  res.end('Hello, World!\n');
});

// Start the server and listen on the specified hostname and port
server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
