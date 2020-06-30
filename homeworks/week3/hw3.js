const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function solve(input) {
  const n = Number(input[0]);
  let len = [];
    for (let i = 1; i <= n; i += 1) {
      len = [];
      for (let j = 1; j <= Number(input[i]); j += 1) {
      if ((Number(input[i]) % j) === 0) {
        len.push(j);
      }
    }
    if (len.length === 2) {
      console.log('Prime');
    } else {
      console.log('Composite');
    }
  }
}

rl.on('close', () => {
  solve(lines);
});
