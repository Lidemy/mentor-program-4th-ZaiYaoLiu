function printFactor(n) {
  var output = [];
  for(let i = 1 ; i <= n ; i++){
    if( n % i == 0){
      output.push(i);
    }
  }
  console.log(output)
}

printFactor(10);

