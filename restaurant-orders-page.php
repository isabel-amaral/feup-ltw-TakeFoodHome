<?php
    session_start();
    require_once('php/output-functions/draw-restaurant-orders.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputRestaurantOrders();
    drawFooter();
?>