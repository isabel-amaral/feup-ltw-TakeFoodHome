<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-fetching/user.php');
    require_once('../../database/data-insertion/update-user-info.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = preg_replace("/[^a-zA-Z0-9_\s]/", '', $_POST['username']);
    $name = preg_replace("/[^a-zA-Z\s]/", '', $_POST['name']);
    $email = preg_replace("/[^a-zA-Z0-9@._\s]/", '', $_POST['email']);
    $phone = $_POST['phone'];
    $address = preg_replace("/[^a-zA-Z0-9\s]/", '', $_POST['address']);

    session_start();
    $_SESSION['errors'] = "";
    if($username == ""){
        $_SESSION['errors']= "Username can´t be empty";
        header('Location: ../../user-info-edit-page.php');
        return;
    } 
    if($name == ""){
        $_SESSION['errors']= "Name can´t be empty";
        header('Location: ../../user-info-edit-page.php');
        return;
    } 
    if($email == ""){
        $_SESSION['errors']= "Email can´t be empty";
        header('Location: ../../user-info-edit-page.php');
        return;
    } 
    if($phone == ""){
        $_SESSION['errors']= "Phone can´t be empty";
        header('Location: ../../user-info-edit-page.php');
        return;
    } 
    if($address == ""){
        $_SESSION['errors']= "Adress can´t be empty";
        header('Location: ../../user-info-edit-page.php');
        return;
    } 


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