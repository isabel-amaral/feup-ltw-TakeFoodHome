<?php
    require_once('php/output-functions/draw-restaurant-info.php');
    require_once('php/output-functions/draw-dishes.php');
    require_once('php/output-functions/draw-reviews.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    output_restaurant_info();
    output_dishes();
    output_reviews();
    drawFooter();
?>
