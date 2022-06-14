<?php
    function outputCart() { ?>
        <button class="button" type="button" id="cartbutton">cart</button>
        <section id="cart">
            <div id="cart-rows">
                <div class="cart-row">
                    <p>Item name</p>
                    <p class="item-price">9.99</p>
                    <input class="item-quantity" type="number" value="1">
                    <button class="button remove">Remove</button>
                </div>
            </div>
            <div class="cart-total">
                <p id="cart-total-price">0</p>
                <p id ="item-number">0<p>
                <button class="button" id="clear">clear</button>
            </div>
            <?php 
                
            ?>
            <form action="php/actions/add-order.php" method="post">
                <input type="hidden" value="<?=$_GET['id']?>" name="restaurantID" >
                <input type="hidden" value="<?=$_SESSION['userID'] ?>"name="userID">
                <input id="foodList" type="hidden" values="" name="foodList">
                <input id="foodListNum" type="hidden" values="" name="foodListNum">
                <input id="purchase" class="button" type="submit" value="Purchase" ></input>
            </form>
        </section>
    <?php
    }
?>