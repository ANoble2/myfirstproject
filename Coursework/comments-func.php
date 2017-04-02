
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
        echo "<div class='message-box'><p>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ashley's Project</title> <!-- title page -->

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.css" rel="stylesheet">
</head>
<body>
<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</body>
</html>
