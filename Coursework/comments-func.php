<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 16:31
 */

function insComments(){
    if (isset($_POST['submitComment'])) { // unless button is pressed shouldn't run code below
       $uid = $_POST['uid'];
       $date = $_POST['date'];
       $message = $_POST['message'];

       $sql = "insert into tbl_comments(uid, date, message) 
                VALUES ('$uid', '$date', '$message')";
        $result = $link->query($sql);
    }
}

?>