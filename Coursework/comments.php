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
<body>

<img src="material/images/logo.PNG">

<?php
echo "<form method='POST' action='".insComments($link)."'>
    <input type='hidden' class='form-control 'name='uid' value='anonymous'>
    <input type='hidden' class='form-control ' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea id='textarea-1' class='form-control' name='message'></textarea><br>
     <button type='button' class='btn btn-primary' name='submitComment'>Post Comment</button>
    
</form>";

retrieveComments($link)

?>



<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>

</html>
