<?php
    function outputRestaurants() {
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurants = getAllRestaurants($db); ?>

        <main>
            <header>
                <h2>Restaurants</h2>
                <input id="search-restaurant" type="text" placeholder="search">
            </header>
            <section id="restaurants">
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
                    <img src="https://picsum.photos/600/300?business" alt="Restaurant's image">
                </article>
            <?php
            } ?>
            </section>
        </main>
    <?php
    }
?>