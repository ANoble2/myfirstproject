<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 */
session_start();// Start the session

echo "user id is {$_SESSION['id']}";
include ('dbConnect.php'); // create connection to the database


$error = false; // variable to store for error to be used later in code whether error is false or true
if(isset($_POST['btn-login'])){ // if btn-login is pressed
    //Help prevent sql injection with cleaning user input / Strip unnecessary characters
    $email = trim($_POST['email']);
    $email = htmlspecialchars(strip_tags($email));

    $password = trim($_POST['password']);
    $password = htmlspecialchars(strip_tags($password));

    if(empty($email)){
        $error = true;
        $errorEmail = 'Please enter a email';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // to validate email check is well formed/expected input
        $error = true;
        $errorEmail = 'Please enter a valid email address';
    }
//validate the users input
    if(empty($password)){
        $error = true;
        $errorPassword = 'Please enter a password';
    }elseif(strlen($password)< 8){ // password must be a least 8 characters long
        $error = true;
        $errorPassword = 'Password  must be at least 8 characters'; // if password isn't 8 characters long presents error message
    }

    if(!$error){
        $password = md5($password); //encrypt password with md5
        // SQL query as a string for selecting all from email column matches email address provided
        $sql = "select * from tbl_users where email='$email' "; // selects all from table called tbl_users where email column = email variable
        // execute the SQL query
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($count==1 && $row['password'] == $password){
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header('location: Home.php'); // redirect user to home page if users login is successful
        }else{
            $errorMsg = 'Incorrect Username and/or Password'; // if login not successful present this error message
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

            </div> <!-- end of nav bar header div -->

        </div> <!-- end of container -->
    </nav> <!-- end of nav bar -->

</head>
<body>
<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-6">
                <h1> Visual Upload</h1><br> <!-- Name of the web app in login page-->
                <img src="material/images/logo.PNG" class="img-rounded "width="304" height="236"/> <!-- logo image for web app -->
            </div> <!-- end of col-md-6 div -->

            <div class="col-md-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> <!-- prevent attackers from exploiting code with login form -->
                    <center><h2> Please Login</h2></center> <!-- heading for form-->
                    <hr/>
                    <?php
                    if(isset($errorMsg)){
                        ?>
                        <div class="alert alert-danger">
                            <span class="glyphicon glyphicon-info-sign"></span>  <!-- displays errorMsg variable at top of the form -->
                            <?php echo $errorMsg; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label> <!-- label to identify login box for email -->
                        <input type="email" name="email" class="form-control" autocomplete="off"> <!-- part of login where to enter email -->
                        <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span> <!-- to echo error message when input is wrong or not valid -->
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label> <!-- label to identify login box for password -->
                        <input type="password" name="password" class="form-control" autocomplete="off"> <!-- part of login where to enter password -->
                        <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span> <!-- to echo error message when input is wrong or not valid -->
                    </div>
                    <div class="form-group">
                        <center><input type="submit" name="btn-login" value="Login" class="btn btn-primary"></center> <!-- button for users to submit -->
                    </div>
                    <hr/>
                    <a href="register.php">Register</a> <!-- link to register page if user doesn't have account already -->
                </form> <!-- end of form -->

            </div> <!-- end of col-md-6 div -->
        </div> <!-- end of row div -->
    </div> <!-- end of jumbotron div -->
    <hr> <!-- creates line to break up content -->
    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer><!-- end of footer for page  -->
</div> <!-- end of container-->



<!-- scripts -->

<script src="material/js/bootstrap.min.js"></script>
<script src="material/js/bootstrap.js"></script>

</body>
</html>