<?php
/**
 * Created by PhpStorm.
 * User: 1407763
 * Date: 07/03/2017
 * Time: 13:12
 */

include ('dbConnect.php');

// create a SQL query as a string
$sql_query = "SELECT title FROM marvelheroes";
// execute the SQL query
$result = $db->query($sql_query);
We can then process the results from this (step 4)
// iterate over $result object one $row at a time
// use fetch_array() to return an associative array
while($row = $result->fetch_array()){
// process the $row
}
?>

<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<h1>Please show something on screen </h1>



</body>
</html>
