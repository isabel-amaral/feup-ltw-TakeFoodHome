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
        $user = getUser($db, $username, $password);

        session_start();
        if ($user) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['userID'] = $user['userID'];
            $_SESSION['name'] = $user['name'];
        }
    
        header('Location: ../../index.php');
    }

    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    initiateSession($username, $password);
?>