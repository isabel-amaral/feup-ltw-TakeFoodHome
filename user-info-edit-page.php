<?php
    session_start();
    require_once('php/output-functions/draw-user-edit-form.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputUserEditForm();
    drawFooter();
?>