<?php
include ('dbConnect.php');
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