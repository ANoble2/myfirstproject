
<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php


$provisionedActivities = array("Specs", "Mugs", "Sausage Rolls"); // declares the array

echo "<h1>My Array</h1>";
printprovisionedActivities($provisionedActivities);

$provisionedActivities[1] = "Hats"; // modifies position 1 (re)

echo "<h1>Swap in Hats</h1>";
printprovisionedActivities($provisionedActivities);

unset($provisionedActivities[2]); // removes the array in position 2

echo "<h1>Take out Sausage Rolls</h1>";
printprovisionedActivities($provisionedActivities);





function printprovisionedActivities ($provisionedActivities)
{
    foreach($provisionedActivities as $x) {
        echo "<p>" . $x . "</p>";
    }
}

?>
</body>
</html>
