const ids = new Map()

//remove item from cart
var removeButtons = document.getElementsByClassName("remove")
for (var i =0;i< removeButtons.length; i++){
  var add = removeButtons[i]
  add.addEventListener("click", removeItem)
}
function removeItem(event){
  var buttonClicked = event.target
  var id = parseInt(buttonClicked.parentElement.getElementsByClassName("dishID")[0].innerText)
  buttonClicked.parentElement.remove()
  
  for (var i =0;i<ids.length;i++){
    if (ids[i] == id && !b2){
      b2 = true;
    }else {
      ids2.push(ids[i]);
    }
  }
  ids.delete(id)
  updateCartTotal()
}

//update quantity
var quantityUpdate = document.getElementsByClassName("item-quantity")
for (var i =0;i< quantityUpdate.length;i++){
  var quantity = quantityUpdate[i]
  quantity.addEventListener("change", quantityChange)
}
function quantityChange(event){
  var input = event.target
  if (isNaN(input.value) || input.value <= 0){
    input.value = 1
  }
  var id = parseInt(input.parentElement.getElementsByClassName("dishID")[0].innerText)
  ids.set(id,parseInt(input.value))
  updateCartTotal()
}


//add item to cart
var addButton = document.getElementsByClassName("add")
for (var i =0;i< addButton.length;i++){
  var add = addButton[i]
  add.addEventListener("click", addItem)
}
function addItem(event){
  var button = event.target
  var item = button.parentElement
  var name = item.getElementsByClassName("dish-name")[0].innerText
  var price = parseFloat(item.getElementsByClassName("dish-price")[0].innerText)
  var id = item.getElementsByClassName("dishID")[0].innerText
  var idint = parseInt(id)
  for (var [key, value] of ids.entries()) {
    if(key == idint){
      alert("item already added")
      return
    }
  }
  ids.set(idint,1)
  //add image if necessary
  var cartRow = document.createElement('div')
  cartRow.classList.add("cart-row")
  cartRow.innerHTML = `
    <p class ="dishName">${name}</p>
    <p class="item-price">${price}</p>
    <input class="item-quantity" type="number" value="1">
    <button class="button remove">Remove</button>
    <p class="dishID"> ${id}</p> 
  `
  var cartItems = document.getElementById("cart-rows")
  cartItems.append(cartRow)
  updateCartTotal()

  cartRow.getElementsByClassName("remove")[0].addEventListener("click", removeItem)
  cartRow.getElementsByClassName("item-quantity")[0].addEventListener("change",quantityChange)
  
}

//update cart total
function updateCartTotal() {
  var totalQuantity =0
  var cart = document.getElementById("cart")
  var cartRows = cart.getElementsByClassName("cart-row")
  var totalPrice = 0;
  for (var i =0;i<cartRows.length;i++){
    var cartRow = cartRows[i]
    var priceElement =  cartRow.getElementsByClassName("item-price")[0]
    var quantityElemente = cartRow.getElementsByClassName("item-quantity")[0]
    var price = parseFloat(priceElement.innerText.replace("$",""))
    var quantity = parseInt(quantityElemente.value)
    totalPrice += price*quantity
    totalQuantity += quantity
  }

  totalPrice = Math.round(totalPrice *100) /100
  if (totalPrice == 0){
    document.getElementById("purchase").style.display = "none"
  }else{
    document.getElementById("purchase").style.display = "flex"
  }
  document.getElementById("cart-total-price").innerText = totalPrice
  document.getElementById("item-number").innerHTML = parseInt(totalQuantity)

  var keys = {}
  var values = {}

  for (var [key, value] of ids.entries()) {
    keys +=" "+key
    values +=" "+value
  }
  console.log(keys,values)
  document.getElementById("foodList").innerText =keys
  document.getElementById("foodListNum").innerText =values
}


//show/hide cart
var button = document.getElementById("cartbutton");
var b = false
button.addEventListener("click", function(){
  var cart = document.getElementById("cart");
  if (b){
    cart.style.display = "none";
    b = false;
  }else{
    cart.style.display = "flex";
    b = true;
  }
})

//clear cart
var clear = document.getElementById("clear")
clear.addEventListener("click",clearCart)
function clearCart(){
  var cartRow = document.getElementById("cart-rows")
  while (cartRow.lastChild){
    cartRow.removeChild(cartRow.lastChild)
  }

  updateCartTotal()
}

window.addEventListener("load", clearCart)


