<?php
session_start();
include ('dbConnect.php');


$error = false;
if(isset($_POST['btn-login'])){
    //Help prevent sql injection with cleaning user input
    $email = trim($_POST['email']);
    $email = htmlspecialchars(strip_tags($email));

    $password = trim($_POST['password']);
    $password = htmlspecialchars(strip_tags($password));

    if(empty($email)){
        $error = true;
        $errorEmail = 'Please enter email';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = true;
        $errorEmail = 'Please enter a valid email address';
    }
//validate the users input
    if(empty($password)){
        $error = true;
        $errorPassword = 'Please enter password';
    }elseif(strlen($password)< 8){
        $error = true;
        $errorPassword = 'Password  must be at least 8 character';
    }

    if(!$error){
        $password = md5($password);
        // SQL query as a string for selecting all from email column matches email address provided
        $sql = "select * from tbl_users where email='$email' ";
        // execute the SQL query
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1 && $row['password'] == $password){
            $_SESSION['username'] = $row['username'];
            header('location: Home.php');
        }else{
            $errorMsg = 'Incorrect Username or Password';
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


<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1> Viusal upload</h1><br>
                <img src="material/images/logo.PNG" width="304" height="236"/>
            </div>
            <div class="col-md-5">
                <div style="width: 500px; margin: 50px auto;" >
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
                        <center><h2>Login</h2></center>
                        <hr/>
                        <?php
                        if(isset($errorMsg)){
                            ?>
                            <div class="alert alert-danger">
                                <span class="glyphicon glyphicon-info-sign"></span>
                                <?php echo $errorMsg; ?>
                            </div>
                            <?php
                        }
                        ?>
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
                            <center><input type="submit" name="btn-login" value="Login" class="btn btn-primary"></center>
                        </div>
                        <hr/>
                        <a href="register.php">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>



<script src="material/js/bootstrap.min.js"></script>
</body>
</html>