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
	var n = Number(lines[0])
    var len = []
    for(let i = 1 ; i <= n ; i++){
    	len = []
        for(let j = 1 ; j <= Number(lines[i]) ; j++){
        	if((Number(lines[i]) % j) === 0){
            	len.push(j)
            }
        }

        if(len.length === 2){
        	console.log("Prime")
        }
        else{
        	console.log("Composite")
        }
    }
}