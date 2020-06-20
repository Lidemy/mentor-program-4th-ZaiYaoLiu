function reverse(str) {
  var restr = "";
  str = str.split("");
  for(let i = str.length - 1 ; i >= 0 ; i--){
    restr += str[i];
  }
  console.log(restr)
}
reverse('hello');
