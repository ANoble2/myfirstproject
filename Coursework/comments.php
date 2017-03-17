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
</head>
<body>

<img src="material/images/logo.PNG">

<?php
echo "<form method='POST' action='".insComments($link)."'>
    <input type='hidden' name='uid' value='anonymous'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <a class=\"btn btn-danger<span class=\"glyphicon glyphicon-remove-sign\"></span> Delete</a>
    <button type='submit' name='submitComment'>Post Comment</button>
</form>";

?>
<div class="panel-body">
    <?php retrieveComments($link);?>
    </div>


</body>


</html>
