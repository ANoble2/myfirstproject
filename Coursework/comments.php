<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 17/03/2017
 * Time: 15:39
 * code sources references below
 * php for beginners - become a php master Edwin Diaz
* https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/overview
 * Learn PHP Programming From Scratch stone river elearning
* https://www.udemy.com/learn-php-programming-from-scratch/learn/v4/content
 * mmtuts learn PHP easily
 * https://www.youtube.com/watch?v=kWOuUkLtQZw&list=PL0eyrZgxdwhwBToawjm9faF1ixePexft-&index=43
 */
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

ini_set('session.cookie_httponly', true); // help against session hijacking with javascript code being inserted to steal session ID
session_start(); // Start the session
date_default_timezone_set('Europe/London');// takes current time specified when submit post
include ('dbConnect.php'); // create connection to the database
include 'comments-func.php'; // reference function for form to use
if(!isset($_SESSION['username'])){ // check user logged in or not , if not redirect to login page (index.php)
    header('location:index.php');
}
$target_dir = 'uploads/'; // specifies the directory where the file is going to be placed
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
    <link href="material/css/bootstrap-theme.min.css" rel="stylesheet">


    <nav class="navbar navbar-default"> <!-- start of nav bar -->
        <div class="container"> <!-- start of container -->

            <div class="navbar-header"> <!-- start of nav bar header div -->

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span> <!-- three lines appear on collapse button -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">Visual Upload</a> <!-- name of web app in nav bar section -->

            </div> <!-- start of nav bar header div -->

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> <!-- section that holds links to other pages-->
                    <li class=><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php">Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class=""><a href="viewPhotos.php">Control Panel</a></li>
                </ul>
                <form class="navbar-form navbar-right"> <!-- makes contents appear on the right -->
                    Welcome : <?php echo $_SESSION['username']; ?> <!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a> <!-- log out button -->
                </form> <!-- end of form -->

            </div>  <!-- end of nav bar collapse div -->

        </div> <!-- end of container -->

    </nav><!--end of nav bar -->

</head>
<body>


<div class="container">
    <div class="jumbotron">
        <!-- Form code for users to post comments and back button to return to gallery -->
        <?php
        echo "<form method='POST' action='".insComments($link)."'>
    <input type='hidden' class='form-control 'name='uid' value='". $_SESSION['username'] ."'>
    <input type='hidden' class='form-control ' name='date' value='".date('Y-m-d H:i:s')."'>
    <input type='hidden' class='form-control ' name='pic_id' value='".$_GET['id']."'>
     <div class='page-header'>
            <p>Return to Gallery
                <a class='btn btn-default' href='gallery.php'>
                    <span class='glyphicon glyphicon-arrow-left'></span>&nbsp;Back
                </a>
            </p>
        </div>
      <label for='comment'><p>Post a Comment:</p></label>
    <textarea class='form-control' name='message' placeholder=' Enter Comment' width='304' height='236'></textarea><br>
     <button type='submit' class='btn btn-primary btn-md' name='submitComment'>Post Comment</button>
    
</form>";
        ?>
    </div>  <!-- end of jumbotron div -->
</div><br>

<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Users Comments
        </div>
        <div class="panel-body">
            <table class=" table table-bordered table-responsive">
                <tbody>
                <tr>
                    <td>
                        <?php
                        echo $row['id'];
                            echo  retrieveComments($link)
                        ?> <!-- displays the comments stored on the database by users -->
                    </td>
                </tr>
                </tbody> <!-- end of table body -->
            </table> <!-- end of table -->
        </div>  <!-- end panel body div -->
    </div> <!-- end of panel primary-->
</div> <!-- end of container-->


<div class="container">

    <hr> <!-- creates line to break up content -->
    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->

</div>



<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>

</html>
