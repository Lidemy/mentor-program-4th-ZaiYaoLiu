const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function solve(input) {
	for (let i = 1; i < input.length; i += 1) {
		const temp = input[i].split(' ');
		const a = BigInt(temp[0]);
		const b = BigInt(temp[1]);
		if (a === b) {
			console.log('DRAW');
		}	else if (Number(temp[2]) === 1) {
			console.log(a > b ? 'A' : 'B');
		} else {
			console.log(a > b ? 'B' : 'A');
		}
  }
}

rl.on('close', () => {
  solve(lines);
});
