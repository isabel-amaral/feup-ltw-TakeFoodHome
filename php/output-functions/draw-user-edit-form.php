<?php
    require_once('php/output-functions/draw-register-form.php');

    function outputUserEditForm() { 
        outputRegisterFormFields(); ?>

                    <input class="submit" type="submit" value="Submit">
                </form>
            </section>
        </main>
    <?php
    }
?>