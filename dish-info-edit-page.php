<?php
    session_start();
    require_once('php/output-functions/draw-dish-edit-form.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputDishEditForm();
    drawFooter();
?>