<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
if ($ip == "127.0.0.1") {
  header("Location: http://127.0.0.1/BDE_beta/maintenance.php");
  exit;
}
header("Location: http://".$_SERVER['HTTP_HOST']."/maintenance.php");
exit;
?>
