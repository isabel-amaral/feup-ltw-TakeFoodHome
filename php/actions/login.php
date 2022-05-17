<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $user = getUser($db, $_POST['username'], sha1($_POST['password']));

    session_start();
    if ($user) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['userID'] = $user['userID'];
        $_SESSION['name'] = $user['name'];
    }

    header('Location: ../../index.php');
?>