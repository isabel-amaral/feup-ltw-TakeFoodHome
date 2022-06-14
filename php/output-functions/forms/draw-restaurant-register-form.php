<?php
    function outputRestaurantRegisterForm() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        
        session_start();
        $db = getDatabaseConnection('database/restaurants.db');
        $user_info = getUserbyID($db, $_SESSION['userID']);
        if ($_SESSION['userID'] === NULL) {
            die(header('Location: ../../register-page.php'));
        } else if ($user_info['owner'] === 0) {
            die(header('Location: ../../user-info-page.php'));            
        } ?>

        <main>
            <section id="restaurantInfo">
                <form action="../../php/actions/add-restaurant.php"  method="post" enctype="multipart/form-data">
                    Restaurant's Name:<input type="text" name="name">
                    Restaurant's Description:<input type="text" name="description">
                    Category:<input type="text" name="category">
                    Email:<input type="email"  name="email">
                    Phone Number: <input type="number"  name="phone">
                    Address: <input type="text"  name="address">
                    Image: <input type="file" , name="picture" id="picture">
                    <input class="submit" type="submit" value="Register">
                </form>
            </section>
        </main>
    <?php
    }
?>
