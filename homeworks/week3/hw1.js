const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function solve(input) {
	const stars = Number(input[0]);
    for (let i = 1; i <= stars; i += 1) {
		console.log('*'.repeat(i));
  }
}

rl.on('close', () => {
  solve(lines);
});
