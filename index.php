<?php
    session_start();
    require_once('php/output-functions/draw-restaurants.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputRestaurants();
    drawFooter();
    $_SESSION['errors'] = "";
?>
