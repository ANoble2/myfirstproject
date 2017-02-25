
<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 25/02/2017
 * Time: 16:03
 */

$provisionedActivities = array("Specs", "Mugs", "Sausage Rolls"); // declares the array
function printmyArray($provisionedActivities)
{
    foreach($provisionedActivities as $x) {
        echo "<p>" . $x . "</p>";
    }
}

?>
</body>
</html>
