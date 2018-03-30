<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 16:47
 */

include "auth.php";

if (!empty($_GET['login']) && !empty($_GET['passwd'])) {

    session_start();

    if (auth($_GET['login'], $_GET['passwd'])) {
        $_SESSION['loggued_on_user'] = $_GET['login'];
        echo "OK\n";
    } else {
        $_SESSION['loggued_on_user'] = "";
        echo "ERROR\n";
    }
} else
    echo "ERROR\n";
?>