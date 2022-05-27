<?php
    require_once('php/output-functions/draw-register-form.php');

    function outputUserEditForm() { ?>
        <main>
            <section id="register">
                <form action="../../php/actions/edit-user-info.php" method="post">
                    Username: <input type="text", name="username">
                    Name: <input type="text", name="name">
                    Email: <input type="email" , name="email">
                    Phone Number: <input type="number" , name="phone">
                    Address: <input type="text" , name="address">
                    Password: <input type="password" , name="password">
                    Owner: <input type="checkbox" , name="user-type[]", value="owner">
                    Courier: <input type="checkbox" , name="user-type[]", value="courier">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>