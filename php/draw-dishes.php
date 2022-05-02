<?php
    function output_dishes() { 
        require_once('database/db-connection.php');
        require_once('database/dishes.php');
        $db = getDatabaseConnection();
        $dishes = getRestaurantDishes($db, $_GET['id']); ?>

        <section id="dishes">
            <?php
            $curr_category = NULL;
            foreach ($dishes as $dish) {
                if ($dish['category'] !== $curr_category) {
                    if ($curr_category !== NULL) ?>
                        </div>
                    <div class="category">
                    <h3><?=$dish['category']?></h3>
                <?php
                } ?>

                <article>
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