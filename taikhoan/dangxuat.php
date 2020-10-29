<?php
session_start();
session_destroy();
$refurl = $_SERVER['HTTP_REFERER'];
header("location: $refurl");
?>