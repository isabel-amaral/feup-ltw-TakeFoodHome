<?php
    function drawLoginForm() {
        session_start();
        if ($_SESSION['username'] === NULL) { ?>
            <form action="../../php/actions/login.php" method="post">
                <span class="label">Username:</span><input id="username-input" type="text" name="username">
                <p class="error"><?=$_SESSION['errors'] ?></p>
                <span class="label">Password:</span><input id="password-input" type="password" name="password">
                <span id="login-buttons">
                    <a href="register-page.php">Register</a>
                    <button type="submit">Login</button>
                </span>
            </form>
        <?php
        }

        else { ?>
            <section id="user-session">
                <h3><a href="user-info-page.php"><?=$_SESSION['name']?></a></h3>
                <form action="../../php/actions/logout.php">
                    <button type="submit">Logout</button>
                </form>
            </section>
        <?php
        }
    }

    function drawHeader() { ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="stylesheet" href="../css/style.css">
            <script type="text/javascript" src="javascript/cart-script.js" defer></script>
            <script type="text/javascript" src="../../javascript/search-restaurant.js" defer></script>
            <script type="text/javascript" src="../../javascript/search-category.js" defer></script>
            <meta charset="UTF-8">
            <title>TakeFoodHome</title>
        </head>
        <body>
        <header>
            <h1><a href="index.php">Take Food Home</a></h1>
            <?php drawLoginForm(); ?>
        </header>
    <?php
    }
?>