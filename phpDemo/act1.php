<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<p>
<?php
    $name = "Ash";
$myage = 18;

    if ($myage >= 21) {
        print " Ash can buy specs, mugs and sauage rolls!";
    }
    elseif ($myage >= 18) {
        print "Ash can buy specs and mugs";
    }
    elseif ($myage >= 16) {
        print "Ash can buy specs";
    }
    else {
        echo "You can't buy anything";
    }
?>

    </p>
</body>
</html>

