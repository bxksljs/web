const { unlink } = require('fs/promises');

async function deleteFile(filePath) {
  try {
    await unlink(filePath);
    console.log(`Deleted ${filePath}`);
  } catch (error) {
    console.error(`Got an error trying to delete the file: ${error.message}`);
  }
}

// Example usage:
const fileToDelete = 'output.txt'; // Replace with your actual file path
deleteFile(fileToDelete);
