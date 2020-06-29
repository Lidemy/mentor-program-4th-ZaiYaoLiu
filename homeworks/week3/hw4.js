const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});


function solve(input) {
	const str = input[0].split('').reverse().join('');
    if (str === input[0]) {
      console.log('True');
    } else {
      console.log('False');
    }
}

rl.on('close', () => {
  solve(lines);
});
