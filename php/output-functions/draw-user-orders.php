<?php
    function outputUserOrders() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user-orders.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $orders = getUserOrders($db); ?>

        <main>
            <section id="orders">
                <h2>Order Number</h2>
                <h2>State</h2>

                <?php foreach($orders as $order) { ?>
                    <p id="orderNumber"><?=$order['orderID']?></p>
                    <p id="orderState"><?=$order['state']?></p>
                <?php
                } 
                ?>                
            </section>
        </main>
    <?php
    }
?>