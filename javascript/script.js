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
}
