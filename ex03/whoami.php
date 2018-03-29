<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 16:58
 */

session_start();

if (empty($_SESSION['loggued_on_user'])) {
    echo $_SESSION['loggued_on_user']."\n";
} else
    echo "ERROR\n";

?>