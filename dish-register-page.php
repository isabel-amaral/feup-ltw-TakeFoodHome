<?php
    session_start();
    require_once('php/output-functions/forms/draw-dish-register-form.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputDishRegisterForm();
    drawFooter();
    $_SESSION['errors'] = "";
?>
