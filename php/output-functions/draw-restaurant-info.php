<?php
    function outputRestaurantInfo() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); ?>


        <button class="button" type="button" id="cart">cart</button>
        <button class="button" type="button" id="add">add</button>

        <section id="popCart">
            <p>This is the cart </p>
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