<?php
    function outputRestaurantInfo() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); ?>
        
        <section id="restaurant">
            <header>
                <h2><?=$restaurant['name']?></h2>
            </header>
            <p><?=$restaurant['description']?></p>
            <button class="button" id="edit-restaurant" type="button" onclick="location.href='dish-register-page.php?restaurantID=<?=$_GET['id']?>'">Add Dish</button>
            <button class="button" id="add-dish" type="button" onclick="location.href='dish-register-page.php?restaurantID=<?=$_GET['id']?>'">Add Dish</button>
            <footer>
                <p><?=$restaurant['address']?></p>
                <p><?=$restaurant['email']?></p>
                <p><?=$restaurant['phoneNumber']?></p>
            </footer>
        </section>
    <?php
    }
?>