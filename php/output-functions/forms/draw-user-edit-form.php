<?php
    function outputUserEditForm() { 
        require_once('database/db-connection.php');
        require_once('database/data-fetching/user.php');

        session_start(); 
        $db = getDatabaseConnection('database/restaurants.db');
        $current_user_info = getUserbyID($db, $_SESSION['userID']);
        $isOwner = $current_user_info['owner'];
        $isCourier = $current_user_info['courier']; ?>
        <main>
            <section id="register">
                <form action="../../php/actions/edit-user-info.php" method="post">
                    Username: <input type="text", name="username", value=<?=$current_user_info['username']?>>
                    Name: <input type="text", name="name", value="<?=$current_user_info['name']?>">
                    Email: <input type="email" , name="email", value=<?=$current_user_info['email']?>>
                    Phone Number: <input type="number" , name="phone", value=<?=$current_user_info['phoneNumber']?>>
                    Address: <input type="text" , name="address", value="<?=$current_user_info['address']?>">
                    Password: <input type="password" , name="password", value=<?=$current_user_info['password']?>>
                    <?php
                    if ($isOwner === 0) { ?>
                        Owner: <input type="checkbox" , name="user-type[]", value="owner">
                    <?php
                    }
                    if ($isCourier === 0) { ?>
                        Courier: <input type="checkbox" , name="user-type[]", value="courier">
                    <?php
                    } ?>
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>