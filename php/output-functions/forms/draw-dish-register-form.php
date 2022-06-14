<?php
    function outputDishRegisterForm() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/restaurants.php');

        $db = getDatabaseConnection('database/restaurants.db');
        $user_info = getUserbyID($db, $_SESSION['userID']);
        $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['restaurantID']);
        $restaurant_info = getRestaurantInfo($db, $restaurantID);
        $ownerID = $restaurant_info['ownerID'];
    
        if ($_SESSION['userID'] === NULL) {
            die(header('Location: ../../register-page.php'));        
        } else if ($user_info['owner'] === 0 || $user_info['userID'] !== $ownerID) {
            die(header('Location: ../../user-info-page.php'));
        } ?>
        <main>
            <section id="dishInfo">
                <form action="../../php/actions/add-dish.php?restaurantID=<?=$restaurantID?>" method="post" enctype="multipart/form-data">
                    Name: <input type="text" name="name">
                    Description: <input type="text" name="description">
                    Price: <input type="number" name="price" step="0.01">
                    Category: <input type="text" name="category">
                    Image: <input type="file" , name="picture" id="picture">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>