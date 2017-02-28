<?php
$username = $_POST["name"];
$password = $_POST["password"];

if ($username =="Ashley" && $password=="cisco")
{
    session_start();
    $_SESSION['access_level_session'] ="standarduser";
}

header('Location: homepage2.php');

?>

