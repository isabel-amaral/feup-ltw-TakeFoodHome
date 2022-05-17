<?php 
    function drawHeader() { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="stylesheet" href="../css/style.css">
            <meta charset="UTF-8">
            <title>TakeFoodHome</title>
        </head>
        <body>
        <header>
            <h1>Take Food Home</h1>
            <form action="../../php/actions/login.php" method="post">
                <span class="label">Username:</span><input type="text" name="username">
                <span class="label">Password:</span><input type="password" name="password">
                <span id="login-buttons">
                    <a href="">Register</a>
                    <button type="submit">Login</button>
                </span>
            </form>
        </header>
    <?php
    }
?>