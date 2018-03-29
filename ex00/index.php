<!DOCTYPE html>
<html>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 28/03/18
 * Time: 18:46
 */

session_start();

if (isset($_SESSION['login']) && isset($_SESSION['pass'])) {
    $login = $_SESSION['login'];
    $pass = $_SESSION['pass'];
} else {
    $login = "";
    $pass = "";
}

if (isset($_GET['login']) && isset($_GET['passwd']) && isset($_GET['submit']) && $_GET['submit'] === "OK") {
    $login = $_GET['login'];
    $pass = $_GET['passwd'];
    $_SESSION['login'] = $login;
    $_SESSION['pass'] = $pass;
}

echo "<html><body>\n";
echo "<form action=\"index.php\">
        Identifiant: <input type=\"text\" name=\"login\" value=\"".$login."\">
        <br>
        Mots de passe: <input type=\"text\" name=\"passwd\" value=\"".$pass."\">
        <br><br>
        <input type=\"submit\" name=\"submit\" value=\"OK\">
     </form>\n";
echo "</body></html>";


?>