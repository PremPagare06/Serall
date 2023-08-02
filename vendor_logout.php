<?php

session_start();
//$_SESSION = array();
session_destroy();
header("location: vendor_login.php");

?>




