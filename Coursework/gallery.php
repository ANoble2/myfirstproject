<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 16/03/2017
 * Time: 15:28
 */
session_start(); // Start the session
include ('dbConnect.php');// create connection to the database
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
    <link href="material/css/bootstrap.min.css" rel="stylesheet">
    <link href="material/css/bootstrap.css" rel="stylesheet">
    <link href="material/css/lity.css" rel="stylesheet">

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

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> <!-- section that holds links to other pages-->
                    <li class=""><a href="Home.php">Home</a></li>
                    <li class="active"><a href="gallery.php">Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class=""><a href="viewPhotos.php">Control Panel</a></li>
                </ul>


                <form class="navbar-form navbar-right"> <!-- makes contents appear on the right -->
                    Welcome : <?php echo $_SESSION['username']; ?><!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a> <!-- log out button -->
                </form> <!-- end of form-->

            </div>  <!-- end of nav bar collapse div -->

        </div> <!-- end of container -->
    </nav>  <!-- end of nav bar -->
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h3 style="text-align:center"><?php echo $_SESSION['username']; ?> Gallery</h3> <!-- displays users name next to gallery-->
    </div>  <!-- end of jumbotron div -->

</div><!-- end of container -->

<div class="gallery">
    <div class="container">

        <?php
        $sql = "select * from tbl_images"; // select all from table tbl_images
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result)){
        while ($row = mysqli_fetch_assoc($result)) {
        ?>



            <div class="col-md-3">
                <div class="row">

                    <center><img src="<?php echo $upload_dir . $row['image'] ?> data-lity class="img-responsive width="300" max-height:220"></center> <!-- display image from database -->
                   <center><p><?php echo $row['name'] ?></p></center> <!-- display image name along with image -->
            </div> <!-- end of row div -->
        </div>  <!-- end of col-md-4 div -->
            <?php
            }
            }
            ?>


    </div> <!-- end of container -->

</div> <!-- end of gallery div -->

<div class="container">

    <hr> <!-- creates line to break up content -->
    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->

</div>



<!-- scripts -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src=material/js/galleryjquery.js></script>
<script src=material/js/lity.js></script>

</body>
</html>