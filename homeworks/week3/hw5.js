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
	for(let i = 1 ; i < lines.length ; i++){
		var temp = lines[i].split(' ')
		var a = BigInt(temp[0])
		var b = BigInt(temp[1]) 
		if(a === b){
			console.log("DRAW")
		}
		else if(Number(temp[2]) === 1){
			console.log(a > b ? "A":"B")
		}
		else{
			console.log(a > b ? "B":"A")
		}
	}	
}