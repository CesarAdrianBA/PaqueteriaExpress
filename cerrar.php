<?php
session_start();
session_unset();
    session_destroy();
// session Complete
$_SESSION = array();
header('location: login.php');

?>