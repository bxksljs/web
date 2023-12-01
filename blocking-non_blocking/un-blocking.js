const fs = require('fs');

// Non-blocking mode
fs.readFile('example.txt', 'utf8', (err, data) => {
  if (err) {
    console.error('Error reading file:', err.message);
  } else {
    console.log('Non-Blocking Mode:', data);
  }
});
