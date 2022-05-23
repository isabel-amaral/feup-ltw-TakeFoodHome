<?php
    function outputRestaurantEditForm() { ?>
        <main>
            <section id="restaurantInfo">
                <form>
                    Restaurant's Name:<input type="text"  name="username">
                    Email:<input type="email"  name="email">
                    Phone Number: <input type="number"  name="phone">
                    Address: <input type="text"  name="address">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>