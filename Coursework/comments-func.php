<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 16:31
 *   $row = $result->fetch_assoc(); // gets all the different results from database to be echoed as goes into a array
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
    while ( $row = $result->fetch_assoc()) { // loop through all messages to display all until none left
        echo "<div class='comBox'><p>";
            echo $row['uid']."<br>"; // display user who posted comment
            echo $row['date']."<br>"; // display date of when comment posted
            echo nl2br($row['message']); // specify what you want to be displayed on page, nl2br to create line breaks in messages
        echo "</p>
            <form class='delete-form' method='post' action='".deletePosts($link)."'>
            <input type ='hidden' name='cid' value='".$row['cid']."'>
            <button type='submit' name='deletePost'>Delete</button>
            
</form>
</div>";
    }
}

function deletePosts($link) {
    if (isset($_POST['deletePost'])) { // unless button is pressed shouldn't run code below
        $cid = $_POST['cid'];

        $sql = "delete from tbl_comments where cid='$cid'";
        $result = $link->query($sql); // variable to store connection to use query on sql variable about with update statement above
        header("location: comments.php");
    }
}
?>