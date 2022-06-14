<?php
    function updateSessionInfo($username, $name) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;

        header('Location: ../../user-info-page.php');
    }

    function initiateSession($username, $password) {
        require_once('../../database/db-connection.php');
        require_once('../../database/data-fetching/user.php');

        $db = getDatabaseConnection('../../database/restaurants.db');
        $user = getUser($db, $username);

        session_start();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['name'] = $user['name'];
        }
        header('Location: ../../index.php');
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    initiateSession($username, $password);
?>