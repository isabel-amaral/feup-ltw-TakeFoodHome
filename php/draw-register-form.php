<?php
    function drawRegisterForm() { ?>
        <main>
            <section id="register">
                <form>
                    Username:<input type="text" , name="username">
                    Password:<input type="password" , name="pass">
                    Email:<input type="email" , name="email">
                    Phone Number: <input type="number" , name="phone">
                    Address: <input type="text" , name="address">
                    <input class="submit" type="submit" value="Register">
                </form>
            </section>
        </main>
    <?php
    }
?>