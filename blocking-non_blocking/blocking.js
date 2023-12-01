const fs = require('fs');

// Blocking mode
try {
  const data = fs.readFileSync('example.txt', 'utf8');
  console.log('Blocking Mode:', data);
} catch (error) {
  console.error('Error reading file:', error.message);
}
