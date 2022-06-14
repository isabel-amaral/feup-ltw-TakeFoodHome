<?php
    function outputUserOrders() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user-orders.php');
        require_once('database/data-fetching/dishes.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $orders = getUserOrders($db); ?>

        <main>
            <section id="orders">
                <h2>Order Number</h2>
                <h2>Dish List</h2>
                <h2>State</h2>

                <?php foreach($orders as $order) { ?>
                    <div class="order">
                        <p id="orderNumber"><?=$order['orderID']?></p>
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
                    <p id="orderState"><?=$order['state']?></p>
                    </div>
                <?php
                } ?>                
            </section>
        </main>
    <?php
    }
?>