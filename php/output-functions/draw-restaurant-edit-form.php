<?php
    function outputRestaurantEditForm() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php'); 
        
        session_start();
        $restaurantID = $_GET['id'];
        $db = getDatabaseConnection('database/restaurants.db');
        $current_restaurant_info = getRestaurantInfo($db, $restaurantID);
        if ($current_restaurant_info['ownerID'] !== $_SESSION['userID']) {
            header('Location: restaurant-page.php?id=' . $restaurantID);
        } ?>
        <main>
            <section id="restaurantInfo">
                <form action="../../php/actions/edit-user-info.php" method='post'>
                    Restaurant's Name:<input type="text" name="username" value="<?=$current_restaurant_info['name']?>">
                    Restaurant's Description:<input type="text" name="description" value="<?=$current_restaurant_info['description']?>">
                    Category:<input type="text" name="category" value="<?=$current_restaurant_info['category']?>">
                    Email:<input type="email"  name="email" value=<?=$current_restaurant_info['email']?>>
                    Phone Number: <input type="number"  name="phone" value=<?=$current_restaurant_info['phoneNumber']?>>
                    Address: <input type="text"  name="address" value="<?=$current_restaurant_info['address']?>">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>
