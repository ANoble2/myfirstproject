<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 */
session_start(); // Start the session
include ('dbConnect.php');// create connection to the database
$upload_dir = 'uploads/'; // specifies the directory where the file is going to be placed

if (isset($_GET['id'])){
     $id = $_GET['id'];
     $sql = "select * from tbl_images where id=" .$id; // finds the record of specific idea to be edited if cant find it displays error
     $result = mysqli_query($link, $sql);
     if(mysqli_num_rows($result) > 0){
     $row =mysqli_fetch_assoc($result);
   }else{
  $errorMsg = 'Could  not select a record';
     }
}

// if upload button is pressed passes variables entered in form
if(isset($_POST['btnUpdate'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    $imgName = $_FILES['myfile']['name']; // extracts information about the file name
    $imgTmp = $_FILES['myfile']['tmp_name'];  // extracts information about the file for temporary location
    $imgSize = $_FILES['myfile']['size']; // extracts information about the file size

    // if form boxes are empty display error
    if(empty($name)){
        $errorMsg = 'Please enter a name';
    }elseif(empty($description)) {
        $errorMsg = 'Please enter description';
    }

    // update image if user select new image
    if($imgName) {
        // get image extension and changes to lower case
        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
        // allow extension
        $allowExt = array('jpeg', 'jpg', 'png', 'gif');
        //random new name for image when goes to database
        $userPic = time() . '_' . rand(1000, 9999) . '.' . $imgExt;
        //check its a valid image
        if (in_array($imgExt, $allowExt)) {
            //check image size is less than certain amount in this case 5MB or displays error
            if ($imgSize < 5000000) {
                // delete the old image
                unlink($upload_dir . $row['image']);
                move_uploaded_file($imgTmp, $upload_dir . $userPic);
            } else {
                $errorMsg = 'The image is too large';
            }
        } else {
            $errorMsg = 'Please select a valid image';
        }
    }else{
        //if not select new image - use old image
        $userPic = $row['image'];
    }

    // check upload file error then can upload image to database
    if(!isset($errorMsg)){
        $sql = "update tbl_images 
                                  set name = '".$name."',
                                  description = '".$description."',
                                  image = '".$userPic."'
                                  where id=".$id;
        $result = mysqli_query($link, $sql);
        if ($result){
            $successMsg = 'New image data has been updated successfully';
            header('refresh;5;viewPhotos.php'); // user redirected to view photos page automatically within 5 secs
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

    <title>Ashley's Project</title><!-- title page -->

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

                <a class="navbar-brand" href="#">Visual Upload</a> <!-- shows web app name in nav bar-->

            </div> <!-- end of nav bar header div -->

            <div class="collapse navbar-collapse"> <!-- section that holds links to other pages-->
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="">Gallery</a></li>
                    <li class="active"><a href="">Upload Images</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    Welcome : <?php echo $_SESSION['username']; ?> <!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a>
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
                <a class="btn btn-default" href="viewPhotos.php"> <!-- button for users to go back to view photos page -->
                    <span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Back
                </a>
            </h3>
        </div>

        <?php
        if(isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <span class="glyphicon glyphicon-info-sign"> <!-- displays errorMsg variable at top of the form -->
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
                <span class="glyphicon glyphicon-info-sign"></span> <!-- displays successMsg variable at top of the form redirecting user-->
                <?php echo $successMsg; ?> redirecting
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
                            <input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>"> <!-- display name contents from database -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-2">Description</label>
                        <div class="col-md-10">
                            <input type="text" name="description" class="form-control" value="<?php echo $row['description']; ?>"> <!-- display description contents from database -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="col-md-2">Image</label>
                        <div class="col-md-10">
                            <img src="<?php echo $upload_dir.$row['image'] ?>" width="200"> <!-- display image from database  -->
                            <input type="file" name="myfile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="btnUpdate"> <!-- button for users to submit -->
                        <span class="glyphicon glyphicon-open"></span> Update Image
                    </button>
                </form> <!-- end of form -->

            </div> <!-- end of panel body div -->
        </div> <!-- end of panel primary div -->
    </div> <!-- end of jumbotron div-->


    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->

</div> <!-- end of container-->


<!--scripts-->
<script src="material/js/bootstrap.min.js"></script>
<script src=material/js/bootstrap.js></script>


</body>
</html>