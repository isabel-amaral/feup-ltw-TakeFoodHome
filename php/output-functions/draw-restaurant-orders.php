<?php
    function outputRestaurantOrders() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurant-orders.php');
        require_once('database/data-fetching/dishes.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $orders = getRestaurantOrders($db, $_GET['id']); ?>
        <main>
            <section id="ordersRestaurant">
                <h2>Order Number</h2>
                <h2>Dish List</h2>
                <h2>State</h2>
                <h2>Change State</h2>

                <?php foreach($orders as $order) { ?>
                    <p class="orderNumber"><?=$order['orderID']?></p>
                    <div class="order-list">
                    <?php 
                        $dishesids = getDishsByOrder($db,$order['orderID']);
                        foreach($dishesids as $dish){ 
                            $i = getDishInfo($db,$dish['dishID']);
                            ?>
                            <div class="item-dish">
                                <p><?=$i['name']?></p>
                                <p><?=$i['price']?></p>
                            </div>
                            <?php
                        }
                    ?>
                    </div>
                    <p class="orderState"><?=$order['state']?></p>
                    <button class="button">Change State</button>  <!-- TODO: mudar para dropdown  -->
                <?php
                } ?>                
            </section>
        </main>
    <?php
    }
?>