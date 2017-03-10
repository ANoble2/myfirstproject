<?php
/**
 * Created by PhpStorm.
 * User: 1407763
 * Date: 07/03/2017
 * Time: 13:14
 */


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

<main>

    <ul>
        <?php
        // create a SQL query as a string
        $sql_query = "SELECT * FROM marvelmovies where yearReleased > 2010";
        // execute the SQL query
        $result = $link->query($sql_query);
        // iterate over $result object one $row at a time
        // use fetch_array() to return an associative array
        while($row = $result->fetch_array()){
            $movieTitle = $row['title'];
            echo "<li>{$movieTitle}</li>";
        }

        ?>
    </ul>
</main>

<footer>

</footer>

</body>
</html>