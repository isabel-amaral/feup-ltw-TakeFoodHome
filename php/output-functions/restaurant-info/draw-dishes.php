<?php
    function outputDishes() {
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');
        require_once('database/data-fetching/dishes.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurant = getRestaurantInfo($db, $_GET['id']);
        $dishes = getRestaurantDishes($db, $_GET['id']); ?>
        
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
                    <header><h4 class="dish-name"><?=$dish['name']?></h4></header>
                    <p><?=$dish['description']?></p>
                    <p class ="dish-price">Price: <?=$dish['price']?> €</p>
                    <img src="../../img/<?=$dish['picture'] ?>" alt="dish">
                    <button class="button add">Buy</button>
                    <p class="dishID"><?=$dish['dishID']?></p>
                    
                    <?php if ($restaurant['ownerID'] === $_SESSION['userID']) { ?>
                        <button class="button" type="button"
                        onclick="location.href='../dish-info-edit-page.php?restaurantID=<?=$_GET['id']?>&dishID=<?=$dish['dishID']?>'">
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
