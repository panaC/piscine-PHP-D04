<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 16:47
 */

include "auth.php";

if (!empty($_POST['login']) && !empty($_POST['passwd'])) {

    session_start();

    if (auth($_POST['login'], $_POST['passwd'])) {
        $_SESSION['loggued_on_user'] = $_POST['login'];

        echo "<html><head></head><body>
                <iframe name=\"chat\" src=\"chat.php\" width=\"100%\" height=\"550px\"></iframe>
                <iframe name=\"speak\" src=\"speak.php\" width=\"100%\" height=\"50px\"></iframe>
              </body></html>";

    } else {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR1\n";
    }
} else
    echo "ERROR2\n";
?>