<?php
$username = $_POST["name"];
$password = $_POST["password"];

if ($username =="Ashley" && $password=="cisco"){
    setcookie('access_level_cookie','standarduser');
}

header('Location: homepage.php');
?>