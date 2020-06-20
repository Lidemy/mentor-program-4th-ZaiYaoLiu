function join(arr, concatStr) {
  var re = arr[0];
  for(let i = 1 ; i < arr.length ; i++){
    re += concatStr + arr[i];
  } 
  return re
}

function repeat(str, times) {
  var re = "";
  for (var i = 0; i < times ; i++) {
    re += str ;
  } 
  return re
}

console.log(join(['a'], '!'));
console.log(repeat('a', 5));
