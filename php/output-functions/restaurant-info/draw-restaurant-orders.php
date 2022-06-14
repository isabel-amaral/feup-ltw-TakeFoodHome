<?php
    function outputRestaurantOrders() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/restaurant-orders.php');
        require_once('database/data-fetching/dishes.php');
        $db = getDatabaseConnection('database/restaurants.db');
        $orders = getRestaurantOrders($db, $_GET['restaurantID']); ?>
        <main>
            <section id="ordersRestaurant">
                <h2>Order Number</h2>
                <h2>Dish List</h2>
                <h2>State</h2>
                <h2>Change State</h2>

                <?php foreach($orders as $order) { ?>
                    <div class="order">
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
                        <form action="php/actions/edit-order-state.php" methode="get">
                            <select name="state">
                                <option value="Received">Received</option>
                                <option value="Preparing">Preparing</option>
                                <option value="Ready">Ready</option>
                            </select>
                            <input type="hidden" value="<?=$order['orderID']?>" name="orderID">
                            <input type="hidden" value="<?=$_GET['restaurantID']?>" name="restaurantID">
                            <input class="button" type="submit" value="Change State">
                        </form>
                    </div>
                <?php
                } ?>                
            </section>
        </main>
    <?php
    }
?>