<?php
    function output_restaurants() {
        require_once('database/db-connection.php');
        require_once('database/restaurants.php');
        $db = getDatabaseConnection();
        $restaurants = getAllRestaurants($db); ?>

        <main>
            <section id="restaurants">
            <header><h2>Restaurants</h2></header>
            <?php
            foreach ($restaurants as $restaurant) { ?>
                <article class="restaurant">
                    <header class="restaurant-name">
                        <h3>
                            <a href=<?='restaurant-page.php?id=' . $restaurant['restaurantID']?>>
                                <?=$restaurant['name']?>
                            </a>
                        </h3>
                    </header>
                    <p class="restaurant-description"><?=$restaurant['description']?></p>
                </article>
            <?php
            } ?>
            </section>
        </main>
    <?php
    }
?>