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

                <a class="navbar-brand" href="#">My Project</a>

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="">Page 1</a></li>
                    <li><a href="">Page 2</a></li>
                </ul>
                <form class="navbar-form navbar-right">
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">

                        <form class="nav navbar-nav navbar-right">
                            <button type="button" class="btn btn-default"> <span class="glyphicon glyphicon-log-in"></span> Login </button>
                            <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Sign Up </button>

                        </form>
                    </div>
                </form>

            </div>

        </div>
    </nav>
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h1>Image Gallery - PHP MySQL</h1>
        <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing responsive, mobile-first projects on the web.</p>
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













        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="material/js/bootstrap.min.js"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</body>
</html>