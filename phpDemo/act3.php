
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
<?php
$myArray = array("specs", "mugs", "sausage rolls");
echo "<h1>Original Array</h1>";
printmyArray($myArray);
$myArray[1] = "hugs"; // modifies position 1 (re)
echo "<h1>Swap in Hugs</h1>";
printmyArray($myArray);
unset($myArray[2]); // removes the array in position 2
echo "<h1>Take out Sausage Rolls</h1>";
printmyArray($myArray);
//I've made a function to print out the array instead of writing the same code repeatedly above.
function printmyArray($myArray)
{
foreach($myArray as $x) {
echo "<p>" . $x . "</p>";
}
}
?>