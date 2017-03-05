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
    <link href="material/style/register-page.css" rel="stylesheet">
</head>

<body id="register-page">

<div class="container">

    <form action="signup.php" class="form-signin" method="post">
        <h2 class="form-signin-heading">Please Enter Details</h2>

        <input type="text" name="first" class="form-control" placeholder="Firstname">
        <input type="text" name="last" class="form-control" placeholder="Last Name">
        <input type="text" name="uid" class="form-control" placeholder="User Name" required>
        <input type="password" name="pwd" class="form-control" placeholder="Password" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    </form>

</div> <!-- /container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="material/js/bootstrap.min.js"></script>

</body>
</html>