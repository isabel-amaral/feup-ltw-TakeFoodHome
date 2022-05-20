<?php
    function outputUserInfo(){ 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $user = getUserbyId($db,$_GET['id']);
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

                <button class="button" type="button">Edit info</button>
            </section>

            <?php 
                if($user['owner'] === 1){
                    ?> <section id = restaurants> <?php
                    $restaurants = getRestaurantbyOwner($db,$_GET['id']);
                    foreach ($restaurants as $restaurant){
                    ?>
                        <article>
                            <h3><a href="restaurant-page.php?id=1"><?=$restaurant['name']?></h3>
                        </article>
                    
                    <?php
                    }
                }
            ?>
        </main>


   <?php 
   }

?>