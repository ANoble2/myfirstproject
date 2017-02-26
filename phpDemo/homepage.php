<!DOCTYPE html> 
<html>
<head>
</head>
<body>

<?php

function displayAccessLevelInformation($accessLevel) {
 if ($accesslevel == "standarduser") {
    echo "<p>You are currently logged in as a standard user </p>";
}
 elseif ($accesslevel == "root") {
    echo "<p>You are currently logged in as a root user </p>";
    echo "<p>You now have access to additional administrative features</p>";
}
}

?>


</body>
</html>
