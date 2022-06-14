<?php
    session_start();
    require_once('php/output-functions/user-info/draw-user-orders.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputUserOrders();
    drawFooter();
?>
