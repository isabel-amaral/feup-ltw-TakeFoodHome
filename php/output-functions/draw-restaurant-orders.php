<?php
    function outputRestaurantOrders() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurant-orders.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $orders = getRestaurantOrders($db, $_GET['id']); ?>
        <main>
            <section id="ordersRestaurant">
                <h2>Order Number</h2>
                <h2>State</h2>

                <?php foreach($orders as $order) { ?>
                    <p id="orderNumber"><?=$order['orderID']?></p>
                    <p id="orderState"><?=$order['state']?></p>
                    <button class="button">Change State</button>  <!-- TODO: mudar para dropdown  -->
                <?php
                } ?>                
            </section>
        </main>
    <?php
    }
?>