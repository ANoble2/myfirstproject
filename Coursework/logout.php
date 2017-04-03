<?php

session_start();

unset($_SESSION['username']); // remove data associated to this particular user
session_unset(); // remove all session variables
session_destroy(); // destroy the session deleting all data associated with particular user
header('location:index.php');

?>