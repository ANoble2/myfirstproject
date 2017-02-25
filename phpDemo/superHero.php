<!DOCTYPE html> 
<html>
<head>
</head>
<body>

<form action="" method="post" <?php echo $_SERVER['PHP_SELF']; ?>>
    <label>Forename</label><input type="text" name="forename">
    <label>Surname</label><input type= "text" name="surname" ><br>
    <input type="radio" name="gender" value="male" checked > Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
   Comment:<textarea name="comment" rows="5" cols="40"></textarea><br>
    <input type="submit" value="Submit">
    <?php
    if(isset($_SERVER['submit'])) {
        $forename = $_POST["forename"];
        $surname = $_POST["surname"];
        $gender = $_POST["gender"];
        $comment = $_POST["comment"];

        echo $forename . $surname . $gender . $comment;
    }
    ?>


</form>


</body>
</html>