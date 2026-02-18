const fs = require('fs');
const path = require('path');

const ignore = ['node_modules', 'vendor', '.git'];
const outputFile = 'project-map.txt';
let outputContent = '';

function addToLog(text) {
  console.log(text);
  outputContent += text + '\n';
}

function printTree(dir, indent = '') {

  const files = fs.readdirSync(dir);

  files.forEach(file => {

    if (ignore.includes(file)) return;

    const filePath = path.join(dir, file);
    const stats = fs.statSync(filePath);

    if (stats.isDirectory()) {

      addToLog(`${indent}\\---${file}`);

      printTree(filePath, indent + '|   ');

    } else {

      addToLog(`${indent}· ${file}`);
    }
  });
}

const rootName = '|---poeticsoft.forge.base';
outputContent = rootName + '\n';
console.log(rootName);

printTree(path.join(__dirname, '..'), '    ');

try {

  fs.writeFileSync(path.join(__dirname, outputFile), outputContent, 'utf8');
  console.log(`\n[SUCCESS] Mapa guardado en: src/${outputFile}`);

} catch (err) {

  console.error('\n[ERROR] No se pudo escribir el archivo:', err);
}