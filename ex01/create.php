<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 28/03/18
 * Time: 19:19
 */

if (empty($_POST['login']) && empty($_POST['passwd']) && empty($_POST['submit']) && $_POST['submit'] === "OK") {
    if (file_exists("../private/passwd")) {
        $f = file_get_contents("../private/passwd");
        $arr = unserialize($f);
    } else {
        @mkdir("../private");
        $arr = array();
    }

    foreach ($arr as $val){
        if (empty($val['login']) && empty($val['passwd']) &&
            ($val['login'] === trim($_POST['login']) || $val['passwd'] === hash("whirlpool", $_POST['passwd']))) {
            echo "ERROR\n";
            exit();
        }
    }

    $arr[] = array("login"=>trim($_POST['login']), "passwd"=>hash("whirlpool", $_POST['passwd']));
    file_put_contents("../private/passwd", serialize($arr));
    echo "OK\n";
} else {
    echo "ERROR\n";
}

?>