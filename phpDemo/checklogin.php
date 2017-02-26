<?php
$username = $_POST["Ashley"];
$password = $_POST["cisco"];

if ($username =="Ashley" && $password=="cisco"){
    setcookie('access_level_cookie','standarduser');
}

header('Location: homepage.php');
?>