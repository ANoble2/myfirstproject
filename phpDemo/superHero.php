<!DOCTYPE html> 
<html>
<head>
</head>
<body>

<form action="superHeroResponse.php" method="post">
    <label>Forename</label><input type="text" name="forename">
    <label>Surname</label><input type= "text" name="surname" >
    <input type="radio" name="gender" value="male" checked > Male<br>
    <input type="radio" name="gender" value="female"> Female<br>
   <label>Comment:</label> <textarea name="comment" rows="5" cols="40"></textarea>
    <input type="submit" value="Submit">
</form>


</body>
</html>