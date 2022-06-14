<?php
    require_once('../../database/db-connection.php');
    require_once('../../database/data-insertion/insert-new-user.php');
    require_once('login.php');

    $db = getDatabaseConnection('../../database/restaurants.db');
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);

    if($username == ""){
        $_SESSION['errors']= "Username can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 
    if($name == ""){
        $_SESSION['errors']= "name can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 
    if($email == ""){
        $_SESSION['errors']= "email can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 
    if($phone == ""){
        $_SESSION['errors']= "phone can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 
    if($address == ""){
        $_SESSION['errors']= "address can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 
    if($password == ""){
        $_SESSION['errors']= "password can´t be empty";
        header('Location: ../../register-page.php');
        return;
    } 

    $isOwner = 0; $isCourier = 0;
    foreach ($_POST['user-type'] as $value) {
        if ($value === 'owner')
            $isOwner = 1;
        if ($value === 'courier')
            $isCourier = 1;
    }

    addUserToDatabase($db, $username, $name, $email, $phone, $address, $password, $isOwner, $isCourier);
    initiateSession($username, $password);
?>