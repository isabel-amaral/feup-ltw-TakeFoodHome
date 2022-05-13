<?php
    function output_dishes() { 
        require_once('database/db-connection.php');
        require_once('database/dishes.php');
        $db = getDatabaseConnection();
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
                    <header><h4><?=$dish['name']?></h4></header>
                    <p><?=$dish['description']?></p>
                    <!-- TODO: get picture from database -->
                    <img src="https://picsum.photos/600/300?business" alt="dish">
                </article>

            <?php
            } ?>
            </div>
        </section>
    <?php
    }
?>