<?php
include "DB.php";
$ob = (object)$_GET;
$link = $ob->link;

$slq = "SELECT * FROM auth_reset WHERE link = '$link'";
echo "<br>$slq<br><br>";
$res = mysqli_query($con, $slq);
if (!$slq) {
    echo "<br>user not found<br><br>";
} else {
    $row = mysqli_fetch_assoc($res);
    print_r($row);
    $status = $row['status'];
    if ($status == 1) {
        echo "<br>link used<br><br>";
    } else {
        echo "<br>link has not been used<br>";
    }
}
// select where link = link
// echo $row->id;
