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
    <link href="material/css/bootstrap.css" rel="stylesheet">

</head>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="">View Gallery</a></li>
                    <li class="active"><a href="">Upload images</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a>
                </form>

            </div>

        </div>

    </nav>


<body>
<div class="container">
    <div class="jumbotron">

        <h2>Upload Images</h2>
    </div>


<div class="panel panel-primary">
    <div class="panel-heading">Choose an image to Upload
    </div>
    <div id="panelbody1" class="panel-body">
        <form action="" method="post" enctype="multipart/form-data" onSubmit="return validateImage();" >>
            Select image to upload:
            <br>
            <br>
            <input type="file" name="img_file" id="img_file">
            <br>
            <input type="submit"  value="Upload Image" name="upload">
        </form>
    </div>
</div>




</body>
</html>

<script src="material/js/bootstrap.min.js"></script>
<script src=material/js/jquery-1.10.2.min.js></script>


</body>
</html>

