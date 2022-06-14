<?php
    function outputDishes() {
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/dishes.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurantID = preg_replace("/[^0-9\s]/", '', $_GET['id']);
        $restaurant = getRestaurantInfo($db, $restaurantID);
        $dishes = getRestaurantDishes($db, $restaurantID); ?>

        <section id="category-and-plates">
            <?php
            $curr_category = $dishes[0]['category']; ?>

            <div class="category">
                <h3><?=$curr_category?></h3>
            <?php
            foreach ($dishes as $dish) {
                if ($dish['category'] !== $curr_category) {
                    $curr_category = $dish['category'];
                    ?>
                        </div>
                        <div class="category">
                        <h3><?=$dish['category']?></h3>
                <?php
                } ?>

                <article class="dish">
                    <header>
                        <h4 class="dish-name"><?=$dish['name']?></h4>
                        <?php if (!checkIfFavouriteREstaurant($db, $_SESSION['userID'], $dish['dishID'])) { ?>
                            <button type="button" class="button" id="add-to-favourites" onclick="location.href='php/actions/add-to-favourite-dishes.php?restaurantID=<?=$restaurantID?>&dishID=<?=$dish['dishID']?>'">
                                <ion-icon name="star-outline"></ion-icon>
                            </button>                        
                        <?php
                        } else { ?>
                            <button type="button" class="button" id="add-to-favourites" onclick="location.href='php/actions/remove-from-favourite-dishes.php?restaurantID=<?=$restaurantID?>&dishID=<?=$dish['dishID']?>'">
                                <ion-icon name="star"></ion-icon>
                            </button>                           
                        <?php
                        } ?>
                    </header>
                    <p><?=$dish['description']?></p>
                    <p class ="dish-price">Price: <?=$dish['price']?> €</p>
                    <img src="../../img/<?=$dish['picture'] ?>" alt="dish">
                    <button class="button add">Buy</button>
                    <p class="dishID"><?=$dish['dishID']?></p>
                    
                    <?php if ($restaurant['ownerID'] === $_SESSION['userID']) { ?>
                        <button class="button" type="button"
                        onclick="location.href='../dish-info-edit-page.php?restaurantID=<?=$restaurantID?>&dishID=<?=$dish['dishID']?>'">
                            Edit info
                        </button>
                    <?php
                    } ?>
                </article>

            <?php
            } ?>
            </div>
        </section>
    <?php
    }
?>
