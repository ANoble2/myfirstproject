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
    $errorUsername = 'Please input username';
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error = true;
    $errorEmail = 'Please a valid input email';
}

if(empty($password)){
    $error = true;
    $errorPassword = 'Please password';
}elseif(strlen($password) < 8){
    $error = true;
    $errorPassword = 'Password must at least 8 characters';
}


//insert data if no error
if(!$error){
    // create a SQL query as a string
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
</head>
<body>
<div class="container">
    <div style="width: 500px; margin: 50px auto;">
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
</body>
</html>