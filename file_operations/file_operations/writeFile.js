const fs = require('fs');

const content = 'This is some text that will be written to the file.';

fs.writeFile('output.txt', content, (err) => {
  if (err) {
    console.error(err);
    return;
  }
  console.log('File written successfully!');
});
