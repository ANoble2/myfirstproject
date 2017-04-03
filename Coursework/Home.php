<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 * code sources references below
 * php for beginners - become a php master Edwin Diaz
https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/overview
 * Learn PHP Programming From Scratch stone river elearning
https://www.udemy.com/learn-php-programming-from-scratch/learn/v4/content
 */
session_start(); // Start the session
include ('dbConnect.php'); // create connection to the database
if(!isset($_SESSION['username'])){ // check user logged in or not , if not redirect to login page (index.php)
    header('location:index.php');
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

    <nav class="navbar navbar-default"> <!-- start of nav bar -->
        <div class="container"> <!-- start of container -->

            <div class="navbar-header"> <!-- start of nav bar header div -->

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <!-- provides collapse button to appear in corner for smaller screens -->
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span> <!-- three lines appear on collapse button -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">Visual Upload</a> <!-- name of web app in nav bar section -->

            </div> <!-- end of nav bar header div -->

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> <!-- section that holds links to other pages-->
                    <li class="active"><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php"> Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class=""><a href="viewPhotos.php">Control Panel</a></li>
                </ul>


                    <form class="navbar-form navbar-right"> <!-- makes contents appear on the right -->
                        Welcome : <?php echo $_SESSION['username']; ?><!-- display logged in users name -->
                        <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a> <!-- log out button -->
                    </form>

                </div> <!-- end of nav bar collapse div -->

        </div> <!-- end of container -->
    </nav> <!-- end of nav bar -->
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>Visual Upload - Photo Gallery</h1>
        <p>Welcome to Visual Upload! <br>You are now able to upload and view your images.</p>
    </div> <!-- end of jumbotron div-->

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <img src="material/images/image%20gallery.PNG" class="img-rounded" alt="Image Gallery" width="304" height="236"> <!-- image for section of web app -->
                <h2><a href="gallery.php">Image Gallery</a></h2>
                <p>View your uploaded images.</p>
            </div>
            <div class="col-md-4">
                <img src="material/images/upload.PNG" class="img-rounded" alt="upload image" width="304" height="236"> <!-- image for section of web app -->
                <h2><a href="uploadimages.php">Upload Images</a></h2>
                <p> Upload and save your favourite images. </p>

            </div>
            <div class="col-md-4">
                <img src="material/images/control%20panel.PNG" class="img-rounded" alt="control panel" width="304" height="236"> <!-- image for section of web app -->
                <h2> <a href="viewPhotos.php">Control Panel</a></h2>
                <p> Allows you to edit and delete your existing images. </p>

            </div>


        </div><!-- end of row -->

    </div> <!-- end of container-->
    <hr> <!-- creates line to break up content -->
    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->
</div><!-- end of container-->

<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>



</body>
</html>