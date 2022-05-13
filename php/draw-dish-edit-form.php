<?php
    function drawDishEditForm() { ?>
        <main>
            <section id="dishInfo">
                <form>
                    Name: <input type="text" , name="name">
                    Description: <input type="text" , name="description">
                    Price: <input type="number" , name="price">
                    Image: <input type="file" , name="image">
                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>