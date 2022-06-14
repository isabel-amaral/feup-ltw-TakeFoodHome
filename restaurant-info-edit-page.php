<?php
    session_start();
    require_once('php/output-functions/forms/draw-restaurant-edit-form.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputRestaurantEditForm();
    drawFooter();
    $_SESSION['errors'] = "";
?>
