<?php
session_start();
$length = 6;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string = '';
for ($p = 0; $p < $length; $p++) {
$string .= $characters[mt_rand(0, strlen($characters))];
}
echo "<font color='blue' size='+1' face='arial'>$string</font>";
$_SESSION['code'] = $string;
?>