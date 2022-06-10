var path = "http://localhost:9000";
var button = document.getElementById("cart");
var add = document.getElementById("add");
var b = false;
var popCart = document.getElementById("popCart");

add.addEventListener("click", function(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      popCart.appendChild(document.createTextNode(this.responseText));
    }
  }

  xhttp.open("GET", path + "/database/data-fetching/js.php", true);
  xhttp.send();
})

/*
button.addEventListener("click", function(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var newp = document.createElement("p");
      newp.appendChild(document.createTextNode(this.responseText));
      button.appendChild(newp);
    }
  }

  xhttp.open("GET", path + "/database/data-fetching/js.php", true);
  xhttp.send();

  console.log("yes");
});
*/

button.addEventListener("click", function(){
  if (b){
    popCart.style.display = "none";
    b = false;
  }else{
    popCart.style.display = "flex";
    b = true;
  }
})
