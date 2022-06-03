var path = "http://localhost:9000";

function init(){
  var button = document.getElementById("cart");
  button.addEventListener("click",showCart());
}

window.onload = function() {
  init();
}

function showCart(){
  var newp = document.createElement("p");
  newp.textContent ="yes yes";
  document.body.appendChild(newp);
  /*
  const request = new XMLHttpRequest()
  request.addEventListener("load", transferComplete)
  request.open("get", path +"/database/data-fetching/js.php", true)
  request.send()
  */
}

function transferComplete() {
  console.log(this.response)
}

async function getData(){
  fetch(path +"/database/data-fetching/js.php");
}

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200){
    console.log(this.responseText)
  }
}

xhttp.open("GET", path +"/database/data-fetching/js.php", true);
xhttp.send();