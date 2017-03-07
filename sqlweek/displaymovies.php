<?php
include ("dbConnect.php");
?>

<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<header>
    <h1>My First Database Thing!</h1>
</header>

<body>

<?php
// create a SQL query as a string
$sql_query = "SELECT * FROM marvelmovies";
// execute the SQL query
$result = $link->query($sql_query);
// iterate over $result object one $row at a time
// use fetch_array() to return an associative array
while($row = $result->fetch_array()){
$movieTitle = $row['title'];
    echo "<p>{$movieTitle}</p>";
}

?>

</body>

<footer>

</footer>

</body>
</html>
