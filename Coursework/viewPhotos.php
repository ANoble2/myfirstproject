<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 */
ini_set('display_errors', 1); // error checking
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session
include ('dbConnect.php');// create connection to the database
$upload_dir = 'uploads/'; // specifies the directory where the file is going to be placed

if(isset($_GET['delete'])){ // if delete button is pressed
   $id = $_GET['delete'];

   //select the old image name from the database
   $sql = "select image from tbl_images where id = ".$id;
   $result = mysqli_query($link, $sql);
   if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       $image = $row['image'];
       // delete record from the database
       unlink($upload_dir.$image);
       $sql = "delete from tbl_images where id=".$id;
       if(mysqli_query($link, $sql)){
           header('location:viewPhotos.php');
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
    <link href="material/css/bootstrap.min.css" rel="stylesheet">
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

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> <!-- section that holds links to other pages-->
                    <li class=""><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php">Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class="active"><a href="viewPhotos.php">Control Panel</a></li>
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

        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header">Uploaded Images
                        <a class="btn btn-default" href="uploadimages.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add new <!-- button for users to go back to upload page -->
                        </a>
                    </h3>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-primary">

                        <div class="panel-heading">
                            Image Gallery Control panel
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive table-bordered">
                                <table class=" table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>ID</th> <!-- headings for table -->
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $sql = "select * from tbl_images"; // select all from table tbl_images
                                    $result = mysqli_query($link, $sql);
                                    if(mysqli_num_rows($result)){
                                    while($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                    <tr>
                                        <td><?php echo $row['id'] ?></td> <!-- display contents from database specified -->
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><img src="<?php echo $upload_dir.$row['image'] ?>" height="40" width="80"> </td> <!-- display image from database -->
                                        <td>
                                            <a class="btn btn-info" href="edit.php?id=<?php echo $row['id'] ?> "><span class="glyphicon glyphicon-edit"></span> Edit</a> <!-- button for users to go edit page -->
                                            <a class="btn btn-danger" href="viewPhotos.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this image?')" >
                                                <span class="glyphicon glyphicon-remove-sign"></span> Delete</a> <!-- button for users to go edit page -->
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody> <!-- end of table body -->
                                </table> <!-- end of table -->
                            </div> <!-- end of table div -->
                        </div> <!-- end of panel body div -->
                    </div> <!-- end of panel primary div -->
                </div> <!-- end of col-md-12 div -->
            </div> <!-- end of second row div -->
        </div> <!-- end of row div -->





        </div> <!-- end of jumbotron div -->
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
