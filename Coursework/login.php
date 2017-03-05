<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 19/02/2017
 * Time: 14:28
 */

session_start();

include ('connection.php');

$username = $_POST ['loginusername'];
$password = $_POST ['loginpassword'];

$query = mysql_query ("select * from users where username = '$username'and password = '$password'");

if (!mysql_query) {
        die(mysql_error());
}

$check = mysql_num_rows ($query);

if($check > 0) {
    $session['user'] = $username;
    header('location:index.php');
}

else {
    echo 'Username or Password Wrong!';
}


?>