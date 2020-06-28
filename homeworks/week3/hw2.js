var readline = require('readline');

var lines = []
var rl = readline.createInterface({
  input: process.stdin
});

rl.on('line', function (line) {
  lines.push(line)
});

rl.on('close', function() {
  solve(lines)
})

function solve(lines) {
	var temp = lines[0].split(" ")
	var a = Number(temp[0])
	var b = Number(temp[1])
	for(var i = a ; i <= b ; i++){
		var digits = Digits(i)
		var sum = Sum(digits)
		if(sum === i){
			console.log(i)
		}
	}	
}

function Digits(x) {
	var digits = []
	while(x > 0){
		digits.push(x % 10)
		x = Math.floor(x / 10)
	}
	return digits
}

function Sum(arr) {
	var sum = 0
	arr.forEach(function (x) {
		sum += x**arr.length
	})
	return sum
}