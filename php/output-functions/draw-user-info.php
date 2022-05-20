<?php
    function outputUserInfo(){ 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $user = getUserbyId($db,$_GET['id']);
        ?>
        <main>
            <section id="userInfo">
                <p>Username:<?=$user['username']?></p>
                <p>Email:<?=$user['email']?></p>
                <p>Phone Number:<?=$user['phoneNumber']?></p>
                <p>Adress:<?=$user['address']?></p>
            </section>
        </main>


   <?php 
   }

?>