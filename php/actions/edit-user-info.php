<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-insertion/update-user-info.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    session_start();
    $current_user_info = getUserbyID($db, $_SESSION['userID']);

    // A user who is already a restaurant owner or a courier can't stop being one
    $isOwner = $current_user_info['owner'];
    $isCourier = $current_user_info['courier'];
    foreach ($_POST['user-type'] as $value) {
        if ($isOwner === 0 && $value === 'owner')
            $isOwner = 1;
        if ($isCourier === 0 && $value === 'courier')
            $isCourier = 1;
    }

    updateUserInfo($db, $_SESSION['userID'], $username, $name, $email, $phone, $address, $isOwner, $isCourier);
    updateSessionInfo($username, $name);
?>