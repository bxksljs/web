const fs = require('fs');

const content = '\nThis is some additional text that will be appended to the file.';

fs.appendFile('output.txt', content, (err) => {
  if (err) {
    console.error(err);
    return;
  }
  console.log('Content appended to file!');
});
