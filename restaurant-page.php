<?php
    session_start();
    require_once('php/output-functions/user-info/draw-cart.php');
    require_once('php/output-functions/restaurant-info/draw-restaurant-info.php');
    require_once('php/output-functions/restaurant-info/draw-dishes.php');
    require_once('php/output-functions/restaurant-info/draw-reviews.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputCart();
    outputRestaurantInfo();
    outputDishes();
    outputReviews();
    drawFooter();
?>
