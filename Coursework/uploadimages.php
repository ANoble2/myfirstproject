<?php

if (isset($_POST["upload"])) {

    $img_file = $_FILES["img_file"]["name"];
    $folderName = "images/";
    $validExt = array("jpg", "png", "jpeg", "bmp", "gif");

    if ($img_file == "") {
        $msg = errorMessage( "Attach an image");
    } elseif ($_FILES["img_file"]["size"] <= 0 ) {
        $msg = errorMessage( "Image is not proper.");
    } else {
        $ext = strtolower(end(explode(".", $img_file)));

        if ( !in_array($ext, $validExt) )  {
            $msg = errorMessage( "Not a valid image file");
        } else {
            $filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;

            if ( move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
                $sql = "INSERT INTO tbl_demo5 VALUES (NULL, '".prepare_input($filePath) ."')";

                $msg = ( mysql_query($sql))  ? successMessage("Uploaded and saved to database.") : errorMessage( "Problem in saving to database");

            } else {
                $msg = errorMessage( "Problem in uploading file");
            }

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
                <form class="navbar-form navbar-right" action="logout.php" method="post">
                    <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"></span> Log Out </button>
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
    <div class="panel-heading">Choose image to Upload
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

