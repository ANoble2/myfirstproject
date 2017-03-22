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


session_start(); // Start the session
date_default_timezone_set('Europe/London');// takes current time specified when submit post
include ('dbConnect.php'); // create connection to the database
include 'comments-func.php'; // reference function for form to use
$upload_dir = 'uploads/'; // specifies the directory where the file is going to be placed
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

        <img src="material/images/logo.PNG">

        <?php
        $sql = "select * from tbl_images where userid = '". $_SESSION['id'] ."'"; // select all from table tbl_images
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result)){
            while ($row = mysqli_fetch_assoc($result)) {
            }
        }
        ?>

        <center><img src="<?php echo $upload_dir . $row['image'] ?>"  height="168" width="290" data-lity class="img-responsive"></center>


        <?php
        echo "<form method='POST' action='".insComments($link)."'>
    <input type='hidden' class='form-control 'name='uid' value='". $_SESSION['username'] ."'>
    <input type='hidden' class='form-control ' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea  name='message'></textarea><br>
     <button type='submit' class='btn btn-primary btn-md' name='submitComment'>Post Comment</button>
    
</form>";

        retrieveComments($link)

        ?>


    </div>  <!-- end of jumbotron div -->

    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->
    </div> <!-- end of container-->




<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>

</html>
