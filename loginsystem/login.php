<?php
/**
 * Created by PhpStorm.
 * User: 1407763
 * Date: 07/03/2017
 * Time: 16:17
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("dbConnect.php"); //Establishing connection with our database


if (empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "Both fields are required.";
}else
}

$username=$_POST ['username'];
$password=$_POST ['password'];

$sql="select uid from users where username='$username' and password='$password'";

$result=mysqli_query($link,$sql);

if (mysqli_num_rows($result)== 1);
{
    header("location: home.php"); //redirecting to another page
}else
{
    echo "incorrect username or password";
}

?>