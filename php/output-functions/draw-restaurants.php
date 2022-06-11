<?php
    function outputRestaurants() {
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurants.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $restaurants = getAllRestaurants($db);
        $categories = getAllCategories($db); ?>

        <main>
            <header>
                <h2>Restaurants</h2>
                <div id="search-form">
                    <input id="search-restaurant" type="text" placeholder="search">
                    <select id="search-categories" name="search-categories">
                        <option value="all" selected>All Categories</option>
                    <?php foreach($categories as $category) { 
                        $category_value = $category['category']; ?>
                        <option value="<?=$category_value?>"><?=$category_value?></option>
                    <?php
                    } ?>
                    </select>
                </div>
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