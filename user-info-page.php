<?php
    session_start();
    require_once('php/output-functions/draw-user-info.php');
    require_once('php/output-functions/draw-header.php');
    require_once('php/output-functions/draw-footer.php');

    drawHeader();
    outputUserInfo();
    drawFooter();
?>
