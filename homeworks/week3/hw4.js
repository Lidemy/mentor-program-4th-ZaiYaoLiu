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
	var str = lines[0].split("").reverse().join("")
    if(str === lines[0]){
    	console.log("True")
    }
    else(
    	console.log("False")
    )
}