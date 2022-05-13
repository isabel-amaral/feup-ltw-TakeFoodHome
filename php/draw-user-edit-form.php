<?php
    function drawUserEditForm() { ?>
        <main>
            <section id="InfoEdit">
                <form>
                    <p>Username:</p> <input type="text" name="username" />
                    <br>
                    <p>Email:</p> <input type="text" name="email" />
                    <br>
                    <p>Phone number:</p> <input type="number" name="phone_number">
                    <br>
                    <p>Address:</p> <input type="text" name="address">
                    <br>
                    <p>Password:</p> <input type="password" name="password">
                    <br>
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>