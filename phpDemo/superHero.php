<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $forename = $_POST["forename"];
    $surname = $_POST["surname"];
    $gender = $_POST["gender"];
    $comment = $_POST["comment"];

    echo $forename . $surname . $gender . $comment;
}
?>
<form action="" method="post">
    <label>Forename</label><input type="text" name="forename">
    <label>Surname</label><input type= "text" name="surname" ><br><br>
    <input type="radio" name="gender" value="male" checked > Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
   Super Power:<textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit" value="Submit">
</form>


</body>
</html>