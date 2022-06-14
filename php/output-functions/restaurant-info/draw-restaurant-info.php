<?php
    function outputRestaurantInfo() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        require_once('database/data-fetching/favourites.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']); 
        ?>
        
        <section id="restaurant">
            <header>
                <h2><?=$restaurant['name']?></h2>
            </header>
            <p><?=$restaurant['description']?></p>
            <?php if ($restaurant['ownerID'] === $_SESSION['userID']) { ?>
            <button class="button" type="button" onclick="location.href='../restaurant-info-edit-page.php?id=<?=$restaurant['restaurantID']?>'">
                Edit info
            </button>
            <button class="button" id="add-dish" type="button" onclick="location.href='dish-register-page.php?restaurantID=<?=$_GET['id']?>'">
                Add Dish
            </button>
            <button class="button" id="orders-button" type="button" onclick="location.href='restaurant-orders-page.php?restaurantID=<?=$_GET['id']?>'">
                See orders
            </button>
            <?php
            } else if (!checkIfFavourite($db, $_SESSION['userID'], $_GET['id'])) { ?>
                <button type="button" class="button" id="add-to-favourites" onclick="location.href='php/actions/add-to-favourites.php?restaurantID=<?=$_GET['id']?>'">
                    <ion-icon name="star-outline"></ion-icon>
                </button>
            <?php
            } else if (checkIfFavourite($db, $_SESSION['userID'], $_GET['id'])) { ?>
                <button type="button" class="button" id="add-to-favourites" onclick="location.href='php/actions/remove-from-favourites.php?restaurantID=<?=$_GET['id']?>'">
                        <ion-icon name="star"></ion-icon>
                </button>            
            <?php
            } ?>

            <footer>
                <p><?=$restaurant['address']?></p>
                <p><?=$restaurant['email']?></p>
                <p><?=$restaurant['phoneNumber']?></p>
            </footer>
        </section>
    <?php
    }
?>