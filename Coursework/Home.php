<?php
session_start();
if(!isset($_SESSION['username'])){
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
    <title>Ashley's Project</title>

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.min.css" rel="stylesheet">

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
                    <li class="active"><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php">Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload</a></li>
                </ul>

                </form>
                    <form class="navbar-form navbar-right" action="logout.php" method="post">
                        Welcome :<?php echo $_SESSION['username']; ?>
                        <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"></span><a href="logout.php">Log Out</a></button>
                    </form>

                </div>

        </div>
    </nav>
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>Visual Upload - Photo Gallery</h1>
        <p>Welcome to Visual Upload! you can now upload and view your images.</p>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <img src="material/images/image%20gallery.PNG" class="img-rounded" alt="Image Gallery" width="304" height="236">
                <h2>Image Gallery</h2>
                <p>View your uploaded images.</p>
            </div>
            <div class="col-md-4">
                <img src="material/images/upload.PNG." class="img-rounded" alt="Responsive" width="304" height="236">
                <h2>Upload images</h2>
                <p> Upload and save your images </p>

            </div>
            <div class="col-md-4">
                <img src="material/images/integration.PNG" class="img-rounded" alt="Integration" width="304" height="236">
                <h2>Integration</h2>
                <p> PHP MySQL, Bootstrap  </p>

            </div>


        </div>

    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2017 Ashley Noble</p>
    </footer>
</div><!-- end of container-->


        <script src="material/js/bootstrap.min.js"></script>


</body>
</html>