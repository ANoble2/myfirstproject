<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 * code sources references below
 * php for beginners - become a php master Edwin Diaz
 * https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/overview
 * Learn PHP Programming From Scratch stone river elearning
 * https://www.udemy.com/learn-php-programming-from-scratch/learn/v4/content
 * code course file uploading
 * https://www.youtube.com/watch?v=PRCobMXhnyw&t=7s
 */
ini_set('session.cookie_httponly', true); // help against session hijacking with javascript code being inserted to steal session ID
session_start(); // Start the session
include ('dbConnect.php'); // create connection to the database
if(!isset($_SESSION['username'])){ // check user logged in or not , if not redirect to login page (index.php)
    header('location:index.php');
}
$target_dir = 'uploads/'; // specifies the directory where the file is going to be placed


// if upload button is pressed passes variables entered in form
if(isset($_POST['btnUpload'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $imgName = $_FILES['myfile']['name']; // extracts information about the file name
    $imgTmp = $_FILES['myfile']['tmp_name']; // extracts information about the file for temporary location
    $imgSize = $_FILES['myfile']['size']; // extracts information about the file size

    // if form boxes are empty display error whether name, description or image is missing
    if(empty($name)){
        $errorMsg = 'Please enter a name';
    }elseif(empty($description)) {
        $errorMsg = 'Please enter description for image';
    }elseif (empty($imgName)) {
        $errorMsg = 'Please select an Image';
    }else{
        // gets image extension and changes to lower case
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        // allowed extensions
        $allowExt = array('jpg', 'jpeg', 'png', 'gif');
        //random new name for image when goes to database
        $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
        //check its a valid image
        if(in_array($imgExt, $allowExt)){
            //check image size is less than certain amount in this case 5MB or displays error
            if($imgSize < 5000000){
                move_uploaded_file($imgTmp,$target_dir.$userPic);
            }else{
                $errorMsg = 'Sorry, The image is too big';
            }
        }else{
            $errorMsg = 'Please select a valid image';
            }
        }

        // check upload file error then can upload image to database
        if(!isset($errorMsg)){
            $sql = "insert into tbl_images(name, description, image, userid)
                values('".$name."', '".$description."', '".$userPic."', '". $_SESSION['id'] ."')";
            $result = mysqli_query($link, $sql);
            if ($result){
                $successMsg = 'New image  has been successfully added';
            header('location:viewPhotos.php'); // user redirected to view photos page automatically within 5 secs
        }else{
                    $errorMsg = 'Error '.mysqli_error($link);
                  }
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
                    <li class="active"><a href="uploadimages.php">Upload Images</a></li>
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
        <div class="page-header">
            <h3> Add New Images
                <a class="btn btn-default" href="viewPhotos.php">
                    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back <!-- button for users to go back to view photos page -->
                </a>
            </h3>
        </div>

        <?php
        if(isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign">  <!-- displays errorMsg variable at top of the form -->
                <strong><?php echo $errorMsg; ?></strong>
                    </span>
            </div>
            <?php
        }
        ?>

        <?php
        if(isset($successMsg)){
            ?>
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-info-sign"></span>
                <strong><?php echo $successMsg; ?> redirecting</strong>  <!-- displays successMsg variable at top of the form -->
            </div>
            <?php
        }
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">Select Images you would like to upload
            </div>
            <div id="panelbody1" class="panel-body">

                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal"> <!-- upload form -->

                    <div class="form-group">
                        <label for="name" class="col-md-2">Name </label>
                        <div class="col-md-10">
                            <input type="text" name="name" class="form-control" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-2">Description</label>
                        <div class="col-md-10">
                            <input type="text" name="description" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="image" class="col-md-2">Image</label>
                        <div class="col-md-10">
                            <input type="file" name="myfile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="btnUpload"> <!-- button for users to submit -->
                        <span class="glyphicon glyphicon-open"></span> Upload Image
                    </button>
                </form> <!-- end of form -->
                
            </div>  <!-- end panel body div -->
        </div>  <!-- end of panel primary div -->
        
        </div>  <!-- end of jumbotron div -->

    <hr> <!-- creates line to break up content -->
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