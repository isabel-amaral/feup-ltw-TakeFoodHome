<?php
    function outputRegisterFormFields() { ?>
        <main>
            <section id="register">
                <form action="../../php/actions/signup-user.php" method="post">
                    Username: <input type="text", name="username">
                    Name: <input type="text", name="name">
                    Email: <input type="email" , name="email">
                    Phone Number: <input type="number" , name="phone">
                    Address: <input type="text" , name="address">
                    Password: <input type="password" , name="password">
                    Owner: <input type="checkbox" , name="user-type[]", value="owner">
                    Courier: <input type="checkbox" , name="user-type[]", value="courier">
    <?php
    }

    function outputRegisterForm() { 
        outputRegisterFormFields(); ?>
                    <input class="submit" type="submit" value="Register">
                </form>
            </section>
        </main>
    <?php
    }
?>