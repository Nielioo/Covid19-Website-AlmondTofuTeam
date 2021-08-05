<?php
session_start();
$_SESSION['username'] = $data['username'];
session_destroy();

header("location: index.php");
?>