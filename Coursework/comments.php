<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 15:39
 *
 */
date_default_timezone_set('Europe/London');// takes current time specified when submit post
include ('dbConnect.php'); // create connection to the database
include 'comments-func.php'; // reference function for form to use

if (isset($_POST['submitComment'])) { // unless button is pressed shouldn't run code below
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    $sql = "insert into tbl_comments(uid, date, message) 
                VALUES ('$uid', '$date', '$message')"; // insert comment information into the tbl_comments table
    $result = $link->query($sql); // variable to store connection to use query on sql variable about with insert statement above

}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ashley's Project</title>

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.css" rel="stylesheet">
    <link href="material/css/comment.css" rel="stylesheet">
</head>
<body>

<img src="material/images/logo.PNG">

<form method='POST' action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type='hidden' name='uid' value='anonymous'>
    <input type='hidden' name='date' value='"<?php date('Y-m-d H:i:s')?>"'>
    <textarea name='message'></textarea><br>
     <button type='submit' class='btn_btn-danger' name='submitComment'>Post Comment</button>
    
</form>
<div class="container">
<div class='form-group'>
<form method='POST' action='"<?php insComments($link);?>"'>
    <input type='hidden' class='form-control' name='uid' value='anonymous'>
    <input type='hidden' class='form-control' name='date' value='"<?php date('Y-m-d H:i:s')?>"'>
    <textarea class='form-control' name='message' ></textarea>
    <button type='submit' class='btn_btn-primary' name='submitComment'>Post Comment</button>

</form>
</div>
</div>


<h3 class="panel-title">User comments</h3>
<div class="panel-body">
    <?php retrieveComments($link);?>
    </div>

<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>

</html>
