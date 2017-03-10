<?php
include ('dbConnect.php');

$error = false;
if(isset($_POST['btn-register'])){
    //Help prevent sql injection with cleaning user input
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = htmlspecialchars($password);
}

//validate the users input
if(empty($username)){
    $error = true;
    $errorUsername = 'Please enter username';
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = true;
    $errorEmail = 'Please enter a valid email address';
}

if(empty($password)){
    $error = true;
    $errorPassword = 'Please enter password';
}elseif(strlen($password) < 8){
    $error = true;
    $errorPassword = 'Password must at least 8 characters';
}

//encrypt password with md5
$password = md5($password);

//insert data if no error
if(!$error){
    //  SQL query as a string for inserting information to database
    $sql = "insert into tbl_users(username, email ,password)
                values('$username', '$email', '$password')";
    if(mysqli_query($link, $sql)){
        $successMsg = ' You have Registered Successfully. <a href="index.php">click here to login</a>';
    }else{
        echo 'Error '.mysqli_error($link);
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
    <link rel="stylesheet" href="material/css/bootstrap.min.css">

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

        </div>
    </nav>

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <h1> Viusal upload</h1><br>
                <img src="material/images/logo.PNG" class="img-rounded "width="304" height="236"/>
            </div>
            <div class="col-md-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                    <center><h2>Register</h2></center>
                    <hr/>
                    <?php
                    if(isset($successMsg)){
                        ?>
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            <?php echo $successMsg; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label>
                        <input type="text" name="username" class="form-control">
                        <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" name="email" class="form-control" autocomplete="off">
                        <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="password" name="password" class="form-control" autocomplete="off">
                        <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span>
                    </div>
                    <div class="form-group">
                        <center><input type="submit" name="btn-register" value="Login" class="btn btn-primary"></center>
                    </div>
                    <hr/>
                    <a href="index.php">Login</a>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <footer class="footer">
        <p>&copy; 2017 Ashley Noble</p>
    </footer>
</div><!-- end of container -->



</body>
</html>