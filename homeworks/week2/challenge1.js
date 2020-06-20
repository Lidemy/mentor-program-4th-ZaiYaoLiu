function search(arr,n) {
  var L = 0;
  var R = arr.length - 1;
  
  while(L <= R){
    var index = Math.floor((L + R) / 2);
    if(arr[index] == n){
      return index;
    }
    else if(arr[index] > n){
      R = index - 1;
    }
    else{
      L = index + 1;
    }    
  }
  return -1;
}