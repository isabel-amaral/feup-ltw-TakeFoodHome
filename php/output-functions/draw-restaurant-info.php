<?php
    function outputRestaurantInfo() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); 
        ?>


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
            
            <form action="php/actions/add-order.php" method="post">
                <input type="hidden" value="<?=$_GET['id']?>" name="restaurantID" >
                <input type="hidden" value="<?=$_SESSION['userID'] ?>"name="userID">
                <input type="hidden" values="" name="foodList">
                <input class="button" type="submit" value="Purchase" ></input>
            </form>
            
        </section>

        <!-- TODO: acrescentar mais informação relevante -->
        
        <section id="restaurant">
            <header>
                <h2><?=$restaurant['name']?></h2>
            </header>
            <p><?=$restaurant['description']?></p>
            <?php if ($restaurant['ownerID'] === $_SESSION['userID']) { ?>
            <button class="button" type="button" onclick="location.href='../restaurant-info-edit-page.php?id=<?=$restaurant['restaurantID']?>'">
                Edit info
            </button>
            <button class="button" id="add-dish" type="button" onclick="location.href='dish-register-page.php?restaurantID=<?=$_GET['id']?>'">
                Add Dish
            </button>
            <button class="button" id="orders-button" type="button" onclick="location.href='restaurant-orders-page.php?restaurantID=<?=$_GET['id']?>'">
                See orders
            </button>
            <?php
            } ?>
            <footer>
                <p><?=$restaurant['address']?></p>
                <p><?=$restaurant['email']?></p>
                <p><?=$restaurant['phoneNumber']?></p>
            </footer>
        </section>
    <?php
    }
?>