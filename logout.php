<?php
session_start();

// Fshij të gjitha të dhënat e session-it
$_SESSION = [];

// Shkatërro session-in
session_destroy();

// Ridrejto përdoruesin te login
header("Location: login.php");
exit();
?>