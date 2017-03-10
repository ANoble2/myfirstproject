<?php

session_start ();

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
                    <li class="active"><a href="#">Home</a></li>
                </ul>

                <?php
                if (isset ($_SESSION['user'])) { ?>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="active"><a href="#">Gallery</a></li>
                        <li class="active"><a href="#">Upload</a></li>
                    </ul>

                <form class="navbar-form navbar-right" action="logout.php" method="post">
                    <P> Welcome <?php echo $_SESSION ['username'];?></P>
                    <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-log-out"></span> Log Out </button>
                </form>


                    <?php } else { ?>

                <form class="navbar-form navbar-right">
                <a href="register.php" type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Sign Up </a>
                    </form>
                     <form class="navbar-form navbar-right" action="login.php" method="post">
                        <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control" name="username">
                         </div>
                         <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control" name="password">
                            </div>
                         <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-log-in"></span> Login </button>

                     </form>
                    <?php } ?>
                    </div>


            </div>

        </div>
    </nav>
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>Visual Upload - Photo Gallery</h1>
        <p>Upload and share unlimited photos.Register a free account today!</p>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <img src="material/images/image%20gallery.PNG" class="img-rounded" alt="Image Gallery" width="304" height="236">
                <h2>Image Gallery</h2>
                <p>Grid Responsive Image Gallery with Image Uploader.</p>
            </div>
            <div class="col-md-4">
                <img src="material/images/responsive.PNG" class="img-rounded" alt="Responsive" width="304" height="236">
                <h2>Responsive</h2>
                <p> Responsive Gallery and Control Panel</p>

            </div>
            <div class="col-md-4">
                <img src="material/images/integration.PNG" class="img-rounded" alt="Integration" width="304" height="236">
                <h2>Integration</h2>
                <p> PHP MySQL, Bootstrap  </p>

            </div>
        </div>














        <script src="material/js/bootstrap.min.js"></script>
        <script src=material/js/jquery-1.10.2.min.js></script>

</body>
</html>