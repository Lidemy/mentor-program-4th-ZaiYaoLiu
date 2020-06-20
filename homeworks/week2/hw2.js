function capitalize(str) {
  var Str = str.split("");
  str = '';
  str = Str[0].toUpperCase();
  for( let i = 1; i < Str.length ; i++){
  	str += Str[i]
  }
  return str
}

console.log(capitalize('hello'));
