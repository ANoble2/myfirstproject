<!DOCTYPE html> 
<?php
$cookie_name = "username";
setcookie('access_level','standarduser');

?>
<html>
<head>
</head>
<body>

<?php
$username = "Ashley";
$password = "cisco";


?>

<form action="homepage.php" method="post">
    Name: <input type="text" name="name"><br>
    Password: <input type="text" name="password"><br>
    <input type="submit">
</form>


</body>
</html>