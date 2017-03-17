<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 16:31
 */

function insComments($link){ // insert comments to the database, link is connection
    if (isset($_POST['submitComment'])) { // unless button is pressed shouldn't run code below
       $uid = $_POST['uid'];
       $date = $_POST['date'];
       $message = $_POST['message'];

       $sql = "insert into tbl_comments(uid, date, message) 
                VALUES ('$uid', '$date', '$message')"; // insert comment information into the tbl_comments table
        $result = $link->query($sql); // variable to store connection to use query on sql variable about with insert statement above
    }
}

function retrieveComments($link) { // to retrieve comments from the database, link is connection
    $sql = "select * from tbl_comments"; // query the database
    $result = $link->query($sql); // variable to store connection to use query on sql variable about with select statement above
    $row = $result->fetch_assoc(); // gets all the different results from database to be echoed as goes into a array
    echo $row['message']; // specify what you want to be displayed on page
}

?>