<?php
    function outputDishEditForm() {
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/dishes.php');
        require_once('database/data-fetching/restaurants.php');

        $db = getDatabaseConnection('database/restaurants.db');
        $user_info = getUserbyID($db, $_SESSION['userID']);
        $dishID = preg_replace("/[^0-9\s]/", '', $_GET['dishID']);
        $dish_info = getDishInfo($db, $dishID);
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
                <form action="../../php/actions/edit-dish-info.php?restaurantID=<?=$restaurantID?>&dishID=<?=$dishID?>" method="post" enctype="multipart/form-data">
                    Name: <input type="text" name="name" value="<?=$dish_info['name']?>">
                    <p class="error"><?=$_SESSION['errors'] ?></p>
                    Description: <input type="text" name="description" value="<?=$dish_info['description']?>">
                    Price: <input type="number" name="price" step="0.01" value="<?=$dish_info['price']?>">
                    Category: <input type="text" name="category" value="<?=$dish_info['category']?>">
                    Image: <input type="file" , name="picture" id="picture">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>