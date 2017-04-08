
<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 16:31
 * code sources references below
 * php for beginners - become a php master Edwin Diaz
* https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/overview
 * Learn PHP Programming From Scratch stone river elearning
* https://www.udemy.com/learn-php-programming-from-scratch/learn/v4/content
 *  * mmtuts learn PHP easily
 * https://www.youtube.com/watch?v=kWOuUkLtQZw&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=43
 */


function insComments($link){ // insert comments to the database, link is connection
    if (isset($_POST['submitComment'])) { // unless button is pressed shouldn't run code below
       $uid = $_POST['uid'];
       $date = $_POST['date'];
       $message = trim($_POST['message']);

       //sanitize message comment from post
        $message = stripslashes($message);
        $message = mysqli_real_escape_string($link, $_POST ['message']);
        $message = htmlspecialchars($message);


       $sql = "insert into tbl_comments(uid, date, message) 
                VALUES ('$uid', '$date', '$message')"; // insert comment information into the tbl_comments table
        $result = $link->query($sql); // variable to store connection to use query on sql variable about with insert statement above
    }
}

function retrieveComments($link) { // to retrieve comments from the database, link is connection
    $sql = "select * from tbl_comments ORDER BY date DESC "; // query the database
    $result = $link->query($sql); // variable to store connection to use query on sql variable about with select statement above
    while ( $row = $result->fetch_assoc($result)) { // loop through all messages to display all until none left
        echo "<div class='panel-primary'><p>";
            echo $row['uid']."<br>"; // display user who posted comment
            echo $row['date']."<br>"; // display date of when comment posted
            echo nl2br($row['message']); // specify what you want to be displayed on page, nl2br to create line breaks in messages
        echo "</p>
            <form class='form-group' method='post' action='".deletePosts($link)."'>
            <input type ='hidden' name='cid' value='".$row['cid']."'>
            <button type='submit' name='deletePost' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'></span> Delete</button>
            <br>
            <br>
            
</form>
</div>";
    }
}

function deletePosts($link) {
    if (isset($_GET['deletePost'])) { // unless delete button is pressed shouldn't run code below
        $cid = $_GET['deletePost'];
        $sql = "delete from tbl_comments where cid='$cid' and uid= '" . $_SESSION['username'] . "'";
        $result = $link->query($sql); // variable to store connection to use query on sql variable about with update statement above
            header('location:comments.php');
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
