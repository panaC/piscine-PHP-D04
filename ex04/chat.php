<html>
<body>
<table style='width: 90%'>
    <tr>
        <th>Login</th>
        <th>Message</th>
        <th>Date</th>
    </tr>

<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 30/03/18
 * Time: 12:29
 */

session_start();

if (!empty($_SESSION['loggued_on_user'])) {
    date_default_timezone_set("Europe/Paris");

    $fn = "../private/chat";
    $hand = @fopen($fn, "r");
    if ($hand) {
        $arr = unserialize(fread($hand, filesize($fn)));
        fclose($hand);

        foreach ($arr as $val) {
            echo "<tr>";
            if (count($val) == 3){
                echo "<td style='width: 10%'>".$val['login']."</td>";
                echo "<td style='width: 70%'>".$val['msg']."</td>";
                echo "<td style='width: 10%'>".date("d/m/y, H:i:s",$val['time'])."</td>";
            }
            echo "</tr>";
        }
    }
}

?>

</table>
</body>
</html>