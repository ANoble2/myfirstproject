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
if(isset($_GET['delete'])){
   $id = $_GET['delete'];

   //select the old image name from the database
   $sql = "select image from tbl_images where id = ".$id;
   $result = mysqli_query($link, $sql);
   if(mysqli_num_rows($result) > 0){
       $row = mysqli_fetch_assoc($result);
       $image = $row['image'];
       unlink($upload_dir.$image);
       // delete record from the database
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
    <title>Ashley's Project</title>

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.min.css" rel="stylesheet">
    <link href="material/css/bootstrap.css" rel="stylesheet">

    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">Visual Upload</a>

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php">Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class="active"><a href="viewPhotos.php">Image Control Panel</a></li>
                </ul>


                <form class="navbar-form navbar-right">
                    Welcome : <?php echo $_SESSION['username']; ?><!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a>
                </form>

            </div>

        </div>
    </nav>
</head>

<body>

<div class="container">
    <div class="jumbotron">

        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header">Add New Image
                        <a class="btn btn-default" href="uploadimages.php"><span class="glyphicon glyphicon-plus"></span>&nbsp;Add new
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $sql = "select * from tbl_images";
                                    $result = mysqli_query($link, $sql);
                                    if(mysqli_num_rows($result)){
                                    while($row = mysqli_fetch_assoc($result)) {

                                    ?>

                                    <tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['description'] ?></td>
                                        <td><img src="<?php echo $upload_dir.$row['image'] ?>" height="40"> </td>
                                        <td>
                                            <a class="btn btn-info" href="edit.php?id=<?php echo $row['id'] ?> "><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                            <a class="btn btn-danger" href="viewPhotos.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this image?')" ><span class="glyphicon glyphicon-remove-sign"></span> Delete</a>
                                        </td>

                                    </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>
        <hr>
        <footer class="footer">
            <p>&copy; 2017 Ashley Noble</p>
        </footer>
    </div><!-- end of container-->


<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>


</body>
</html>
