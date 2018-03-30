<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 09:39
 */

if (!empty($_POST['login']) && !empty($_POST['oldpw']) && !empty($_POST['newpw'])
    && !empty($_POST['submit']) && $_POST['submit'] === "OK") {

    if (file_exists("../private/passwd")) {
        $f = file_get_contents("../private/passwd");
        $arr = unserialize($f);
    } else {
        exit();
    }

    echo "in\n";

    foreach ($arr as $key=>$val){
        if (!empty($val['login']) && $val['login'] === trim($_POST['login']) &&
            !empty($val['passwd']) && $val['passwd'] === hash("whirlpool", $_POST['oldpw'])) {

            $arr[$key]['passwd'] = hash("whirlpool", $_POST['newpw']);
            file_put_contents("../private/passwd", serialize($arr));
            header("location: index.html");
            echo "OK\n";
            exit();
        }
    }
}

echo "ERROR\n";

?>