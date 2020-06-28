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
	var N = Number(lines[0])
    for(let i = 1 ; i <= N ; i++){
    	console.log("*".repeat(i))
    }
}