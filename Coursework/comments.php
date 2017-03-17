<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 15:39
 * textarea {
width: 400px;
height: 80px;
background-color: #fff;
resize:none;
}
 */



date_default_timezone_set('Europe/London');// takes current time specified when submit post
include ('dbConnect.php'); // create connection to the database
include 'comments-func.php'; // reference function for form to use
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ashley's Project</title>

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.css" rel="stylesheet">

</head>
<div>

<img src="material/images/logo.PNG">

<?php
echo "<form method='POST' action='".insComments($link)."'>
    <input type='hidden' name='uid' value='anonymous'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
     <button type='submit' class='btn_btn-danger' name='submitComment'>Post Comment</button>
    
</form>";


?>
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
