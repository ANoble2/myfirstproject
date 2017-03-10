
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ashley's Project</title>

    <!-- Bootstrap -->

    <link href="material/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div style="width: 500px; margin: 50px auto;">
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





<script src="material/js/bootstrap.min.js"></script>
</body>
</html>