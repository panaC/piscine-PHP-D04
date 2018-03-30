<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 29/03/18
 * Time: 16:42
 */

function auth($login, $passwd){

    if (!empty($login) && !empty($passwd)) {

        if (file_exists("../private/passwd")) {
            $f = file_get_contents("../private/passwd");
            $arr = unserialize($f);
        } else {
            return false;
        }

        foreach ($arr as $val){
            if (!empty($val['login']) && $val['login'] === trim($login) &&
                $val['passwd'] === hash("whirlpool", $passwd)) {
                return true;
            }
        }

        return false;
    }
}

?>