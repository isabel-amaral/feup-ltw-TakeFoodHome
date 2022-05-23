<?php
    function outputUserInfo(){ 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $user = getUserbyId($db,$_SESSION['userID']);
        ?>
        <main>
            <section id="userInfo">
                <p>Username:</p>
                <p> <?=$user['username']?></p>
                <p>Email:</p>
                <p> <?=$user['email']?></p>
                <p>Phone Number:</p>
                <p><?=$user['phoneNumber']?></p>
                <p>Address:</p>
                <p><?=$user['address']?></p>

                <button class="button" type="button" onclick="location.href='../user-info-edit-page.php'">Edit info</button>
            </section>

            <section id="restaurants">
            <article>
                <h2>Your Restaurants</h2>
                <ul>
            <?php 
                if($user['owner'] === 1){
                    $restaurants = getRestaurantbyOwner($db,$_SESSION['userID']);
                    foreach ($restaurants as $restaurant){
                    ?>
                        
                        <li><a href="../restaurant-page.php?id=<?=$restaurant['restaurantID']?>"><?=$restaurant['name']?></a></li>
                        
                    
                    <?php
                    }
                }
            ?>
            <ul>
            </article>
            </section>
        </main>


   <?php 
   }

?>