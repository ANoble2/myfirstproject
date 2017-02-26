<?php
$username = $_POST["Ashley"];
$password = $_POST["cisco"];

if ($username =="username" && $password=="password"){
    setcookie('access_level_cookie','standarduser');
}

header('Location: homepage.php');