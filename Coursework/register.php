<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 11/03/2017
 * Time: 15:27
 * code sources references below
 * php for beginners - become a php master Edwin Diaz
 * https://www.udemy.com/php-for-complete-beginners-includes-msql-object-oriented/learn/v4/overview
 * Learn PHP Programming From Scratch stone river elearning
 * https://www.udemy.com/learn-php-programming-from-scratch/learn/v4/content
 * * code course php tutorials
 * https://www.youtube.com/watch?v=9kyQGBABA38&list=PLE134D877783367C7
 */
include ('dbConnect.php'); // create connection to the database

$error = false; // variable to store for error to be used later in code whether error is false or true
if(isset($_POST['btn-register'])){ // if btn-register is pressed

    //Help prevent sql injection with cleaning user input / Strip unnecessary characters
    $username = $_POST['username'];
    $username = strip_tags($username);
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($link, $_POST ['username']);
    $username = htmlspecialchars($username);

    $email = $_POST['email'];
    $email = strip_tags($email);
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($link, $_POST ['email']);
    $email = htmlspecialchars($email);

    $password = $_POST['password'];
    $password = strip_tags($password);
    $password = stripslashes($password);
    $password = mysqli_real_escape_string($link, $_POST ['password']);
    $password = htmlspecialchars($password);


//validate the users input
if(empty($username)){
    $error = true;
    $errorUsername = 'Please enter a username';
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){ // to validate email check is well formed/expected input
    $error = true;
    $errorEmail = 'Please enter a valid email address';
}

if(empty($password)){
    $error = true;
    $errorPassword = 'Please enter a password'; 
}elseif(strlen($password) < 8){ // password must be a least 8 characters long
    $error = true;
    $errorPassword = 'Password must be at least 8 characters'; // if password isn't 8 characters long presents error message
}

//encrypt password
//$password = md5($password); old code for passwords
$StorePassword = password_hash($password,PASSWORD_BCRYPT,array('cost' => 10));

//insert data if no error is found
if(!$error) {
    //  SQL query as a string for inserting information to database
    $sql = "insert into tbl_users(username, email ,password) 
                values('$username', '$email', '$StorePassword')"; // insert values specified into tbl_users in columns username , email , password
    if (mysqli_query($link, $sql)) {
        $successMsg = ' You have Registered Successfully. <a href="index.php">click here to login</a>'; // if register successful display this message to direct to login page
    } else {
        echo 'Error ' . mysqli_error($link); // if register unsuccessful display error
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
    <link rel="stylesheet" href="material/css/bootstrap.css">


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
                <h1> Visual upload</h1><br>  <!-- Name of the web app in login page-->
                <img src="material/images/logo.PNG" class="img-rounded "width="304" height="236"/> <!-- logo image for web app -->
            </div> <!-- end of col-md-6 div -->
            
            <div class="col-md-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off"> <!-- prevent attackers from exploiting  code with register form -->
                    <center><h2>Register</h2></center> <!-- heading for form-->
                    <hr/>
                    <?php
                    if(isset($successMsg)){
                        ?>
                        <div class="alert alert-success">
                            <span class="glyphicon glyphicon-info-sign"></span> <!-- displays successMsg variable at top of the form -->
                            <?php echo $successMsg; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="username" class="control-label">Username</label> <!-- label to identify login box for username -->
                        <input type="text" name="username" class="form-control" autocomplete="off"> <!-- part of form where to enter username -->
                        <span class="text-danger"><?php if(isset($errorUsername)) echo $errorUsername; ?></span> <!-- to echo error message when input is wrong or not valid -->
                    </div>
                    <div class="form-group">
                        <label for="email" class="control-label">Email</label> <!-- label to identify login box for email -->
                        <input type="email" name="email" class="form-control" autocomplete="off"> <!-- part of form where to enter email -->
                        <span class="text-danger"><?php if(isset($errorEmail)) echo $errorEmail; ?></span> <!-- to echo error message when input is wrong or not valid -->
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label> <!-- label to identify login box for password -->
                        <input type="password" name="password" class="form-control" autocomplete="off"> <!-- part of form where to enter password -->
                        <span class="text-danger"><?php if(isset($errorPassword)) echo $errorPassword; ?></span> <!-- to echo error message when input is wrong or not valid -->
                    </div>
                    <div class="form-group">
                        <center><input type="submit" name="btn-register" value="Register" class="btn btn-primary"></center>  <!-- button for users to submit -->
                    </div>
                    <hr/>
                    Back to <a href="index.php">Login Page</a> <!-- link  back to login page -->
                </form>
                
            </div> <!-- end of col-md-6 div -->
        </div> <!-- end of row div -->
    </div> <!-- end of jumbotron div -->
    
    <hr> <!-- creates line to break up content --> 
    <footer class="footer"> <!-- start of footer for page  -->
        <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
    </footer> <!-- end of footer for page  -->
</div><!-- end of container -->


<!-- scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</body>
</html>