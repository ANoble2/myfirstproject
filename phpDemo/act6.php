<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php

//Make an array
$lotteryArray = array("Ashley", "Petr", "Joesph", "Brian", "William", "Steve", "Mike", "Fiona" , "Heather", "Mary");

//Sort the array
sort($lotteryArray);

//Select the winner
$winner = (rand(0,count($lotteryArray))) - 1;

//Prints the winner
echo "<p>The winner of all the specs is " . strtoupper($lotteryArray[$winner]) . "</p>";

//Remove the person from the array
unset($array[$winner]);

//for mugs
$winner = (rand(0,count($lotteryArray))) - 1;
echo "<p>The winner of all the mugs is " . strtoupper($lotteryArray[$winner]) . "</p>";
unset($array[$winner]);

//for sausuage rolls
$winner = (rand(0,count($lotteryArray))) - 1;
echo "<p>The winner of all the sausage rolls is " . strtoupper($lotteryArray[$winner]) . "</p>";


?>

</body>
</html>