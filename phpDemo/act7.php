<!DOCTYPE html> 
<html>
<head>
</head>
<body>
<?php

function awardforcapture($specsowned, $mugsowned, $sausagerollsowned)
{
    $award = 10 * (($specsowned * $mugsowned * $sausagerollsowned)/2);
    return $award;
}
function printWantedBanner($name, $specsowned, $mugsowned, $sausagerollsowned)
{
    echo "<p><strong>Wanted:</strong> ". $name . "</p>";
    echo "<p>Known to be in posession of the following items:</p>";
    echo "<p>Specs: " . $specsowned . "</p>";
    echo "<p>Mugs:" . $mugsowned . "</p>";
    echo "<p>Sausage Rolls: " . $sausagerollsowned . "</p>";
    echo "<p>Award for capture: £" . awardforcapture($specsowned,$mugsowned,$sausagerollsowned) . "</p><br><br>";
}
printWantedBanner("Ashley Noble",1,2,3);
printWantedBanner("Rusty the Dog",3,4,5);
printWantedBanner("Fiona Calder",6,7,8);
?>


</body>
</html>