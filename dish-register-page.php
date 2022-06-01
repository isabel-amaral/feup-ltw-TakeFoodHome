<?php
    session_start();
    require_once('php/output-functions/draw-dish-register-form.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputDishRegisterForm();
    drawFooter();
?>
