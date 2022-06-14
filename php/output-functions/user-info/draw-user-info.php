<?php
    function outputUserInfo(){ 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/restaurants.php');
        require_once('database/data-fetching/favourites.php');
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
                <button class="button" id="user-order-button" type="button" onclick="location.href='../user-orders-page.php'">My orders</button>
            </section>

            <section id="favourite-restaurants">
                <article>
                    <h2>Your Favourite Restaurants</h2>
                    <ul>
                    <?php
                    $favourites = getAllFavourites($db, $_SESSION['userID']);
                    foreach ($favourites as $favourite) { ?>
                        <li><a href="../restaurant-page.php?id=<?=$favourite['restaurantID']?>"><?=$favourite['name']?></a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </article>
            </section>

            <?php 
                if($user['owner'] === 1) { ?>
                    <section id="restaurants">
                        <article>
                            <h2>Your Restaurants</h2>
                            <ul>
                            <?php
                            $restaurants = getRestaurantbyOwner($db, $_SESSION['userID']);
                            foreach ($restaurants as $restaurant) { ?>
                                <li><a href="../restaurant-page.php?id=<?=$restaurant['restaurantID']?>"><?=$restaurant['name']?></a></li>
                            <?php
                            } ?>
                            </ul>
                            <button class="button" type="button" onclick="location.href='../restaurant-register-page.php'">Add Restaurant</button>
                        </article>
                    </section>
                <?php
                } ?>
        </main>
   <?php 
   }
?>