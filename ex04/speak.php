<html>
<head>
    <script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
</head>
<body>
<form method="post" action="speak.php">
    <input type="text" name="msg" value="" style="width: 90%">
    <input type="submit" value="speak" style="width: 8%">
</form>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 30/03/18
 * Time: 11:42
 */

session_start();

if (!empty($_SESSION['loggued_on_user']) && !empty($_POST['msg']))
{
    date_default_timezone_set("Europe/Paris");
    $fn = "../private/chat";

    if (!file_exists($fn)) {
        file_put_contents($fn, "");
    }

    $hand = fopen($fn, "r");
    if ($hand) {
        $f = fread($hand, filesize($fn));
        fclose($hand);
        $arr = unserialize($f);

        $arr[] = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $_POST['msg']);

        $hand = fopen($fn, "c");
        if ($hand) {
            flock($hand, LOCK_EX);
            fwrite($hand, serialize($arr));
            flock($hand, LOCK_UN);
        }
    }
}

?>