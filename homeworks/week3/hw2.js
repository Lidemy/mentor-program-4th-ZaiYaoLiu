const readline = require('readline');

const lines = [];
const rl = readline.createInterface({
  input: process.stdin,
});

rl.on('line', (line) => {
  lines.push(line);
});

function Digits(n) {
	let x = n;
	const digits = [];
	while (x > 0) {
		digits.push(x % 10);
		x = Math.floor(x / 10);
	}
	return digits;
}

function Sum(arr) {
	let all = 0;
	arr.forEach((x) => {
		all += x ** arr.length;
	});
	return all;
}

function solve(input) {
	const temp = input[0].split(' ');
	const a = Number(temp[0]);
	const b = Number(temp[1]);
	for (let i = a; i <= b; i += 1) {
		const digits = Digits(i);
		const sum = Sum(digits);
		if (sum === i) {
			console.log(i);
		}
	}
}

rl.on('close', () => {
  solve(lines);
});
