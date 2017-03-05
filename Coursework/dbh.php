<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 05/03/2017
 * Time: 14:09
 */
$conn = mysqli_connect("localhost","root", "", "logintest");

if (!$conn) {
    die("connection failed: ".mysqli_connect_error());
}

?>