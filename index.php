<?php
    session_start();
    echo $_SESSION['username'];
    require_once('php/output-functions/draw-restaurants.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    output_restaurants();
    drawFooter();
?>

