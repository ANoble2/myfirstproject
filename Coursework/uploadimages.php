<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 */
session_start();
include ('dbConnect.php');
$upload_dir = 'uploads/';

// if upload button is pressed passes variables entered in form
if(isset($_POST['btnUpload'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $imgName = $_FILES['myfile']['name'];
    $imgTmp = $_FILES['myfile']['tmp_name'];
    $imgSize = $_FILES['myfile']['size'];

    // if form boxes are empty display error
    if(empty($name)){
        $errorMsg = 'Please enter a name';
    }elseif(empty($description)) {
        $errorMsg = 'Please enter description';
    }elseif (empty($imgName)) {
        $errorMsg = 'Please select an Image';
    }else{
        // gets image extension
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        // allowed extensions
        $allowExt = array('jpeg', 'jpg', 'png', 'gif');
        //random new name for image
        $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
        //check its a valid image
        if(in_array($imgExt, $allowExt)){
            //check image size is less than certain amount in this case 5MB
            if($imgSize < 500000){
                move_uploaded_file($imgTmp,$upload_dir.$userPic);
            }else{
                $errorMsg = 'The image is too large';
            }
        }else{
            $errorMsg = 'Please select a valid image';
            }
        }

        // check upload file error then can upload image to database
        if(!isset($errorMsg)){
            $sql = "insert into tbl_images(name, description, image)
                values('".$name."', '".$description."', '".$userPic."')";
            $result = mysqli_query($link, $sql);
            if ($result){
                $successMsg = 'New image data has been successfully added';
            header('refresh;5;uploadimages.php');
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

    <title>Ashley's Project</title>

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.css" rel="stylesheet">
    <link href="material/css/bootstrap-theme.min.css" rel="stylesheet">


    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">Visual Upload</a> <!-- shows web app name in nav bar-->

            </div>

            <div class="collapse navbar-collapse"> <!-- section that holds links to other pages-->
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="">Gallery</a></li>
                    <li class="active"><a href="">Upload Images</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    Welcome : <?php echo $_SESSION['username']; ?> <!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a>
                </form>

            </div>

        </div>

    </nav><!--end of nav bar -->

</head>


<body>

<div class="container">
    <div class="jumbotron">
        <div class="page-header">
            <h3> Add New Images
                <a class="btn btn-default" href="viewPhotos.php">
                    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                </a>
            </h3>
        </div>

        <?php
        if(isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign">
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
                <strong><?php echo $successMsg; ?> redirecting</strong>
            </div>
            <?php
        }
        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">Select Images you would like to upload
            </div>
            <div id="panelbody1" class="panel-body">

                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

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
                    <button type="submit" class="btn btn-success" name="btnUpload">
                        <span class="glyphicon glyphicon-open"></span> Upload Image
                    </button>
                </form>
            </div>
        </div>
        </div>


    <footer class="footer">
        <p>&copy; 2017 Ashley Noble</p>
    </footer>

</div> <!-- end of container-->


<!--scripts-->
<script src="material/js/bootstrap.min.js"></script>
<script src=material/js/bootstrap.js></script>


</body>
</html>