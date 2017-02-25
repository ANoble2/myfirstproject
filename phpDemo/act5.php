<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php
//stock
$spec_stock = 7;
$mug_stock = 7;
$sausageroll_stock = 7;
// first date of the month
$monthDate = 1;
while(($spec_stock > 0) && ($mug_stock > 0) && ($sausageroll_stock > 0)) {
    $todaysGood = rand(0,2);
    //specs = 0
    //mugs = 1
    //sausagerolls = 2
    switch ($todaysGood) {
        case 0:
            $spec_stock--;
            echo "On day " . $monthDate . " Specs are available<br>";
            break;
        case 1:
            $mug_stock--;
            echo "On day " . $monthDate . " Mugs are available<br>";
            break;
        case 2:
            $sausageroll_stock--;
            echo "On day " . $monthDate . " Sausage Rolls are available<br>";
            break;
    }
    $monthDate++; //puts the month forward by one day
}
echo "Sorry no more goods are available this month";

?>

</body>
</html>