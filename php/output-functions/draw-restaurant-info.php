<?php
    function output_restaurant_info() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); ?>

        <!-- TODO: acrescentar mais informação relevante -->
        
        <section id="restaurant">
            <h2><?=$restaurant['name']?></h2>
            <p><?=$restaurant['description']?></p>
        </section>
    <?php
    }
?>