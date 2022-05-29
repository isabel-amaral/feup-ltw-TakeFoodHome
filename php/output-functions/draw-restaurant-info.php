<?php
    function outputRestaurantInfo() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); ?>

        <script src="../javascript/script.js" defer></script>

        <button class="button" type="button" id="cart">cart</button>

        <!-- TODO: acrescentar mais informação relevante -->
        
        <section id="restaurant">
            <h2><?=$restaurant['name']?></h2>
            <p><?=$restaurant['description']?></p>
            <p><?=$restaurant['address']?></p>
            <p><?=$restaurant['email']?></p>
            <p><?=$restaurant['phoneNumber']?></p>
            <p><?=$restaurant['category']?></p>
        </section>
    <?php
    }
?>