<?php
    function outputRestaurantEditForm() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php'); 
        
        session_start();
        $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['id']);
        $db = getDatabaseConnection('database/restaurants.db');
        $current_restaurant_info = getRestaurantInfo($db, $restaurantID);
        if ($current_restaurant_info['ownerID'] !== $_SESSION['userID']) {
            die(header('Location: restaurant-page.php?id=' . $restaurantID));
        } 
        
        $action_link = "../../php/actions/edit-restaurant-info.php?id=" . $restaurantID ?>

        <main>
            <section id="restaurantInfo">
                <form action=<?=$action_link?>  method='post' enctype="multipart/form-data">
                    Restaurant's Name:<input type="text" name="name" value="<?=$current_restaurant_info['name']?>">
                    <p class="error"><?=$_SESSION['errors'] ?></p>
                    Restaurant's Description:<input type="text" name="description" value="<?=$current_restaurant_info['description']?>">
                    Category:<input type="text" name="category" value="<?=$current_restaurant_info['category']?>">
                    Email:<input type="email"  name="email" value=<?=$current_restaurant_info['email']?>>
                    Phone Number: <input type="number"  name="phone" value=<?=$current_restaurant_info['phoneNumber']?>>
                    Address: <input type="text"  name="address" value="<?=$current_restaurant_info['address']?>">
                    Image: <input type="file" , name="picture" id="picture">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>
