<?php

session_start();

unset($_SESSION['username']);
session_unset(); // remove all session variables
session_destroy(); // destroy the session
header('location:index.php');

?>