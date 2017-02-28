<!DOCTYPE html> 
<html>
<head>
</head>
    <body>
<p>
    <?php
    echo "Hello World";
    echo "Hello,".""."world"."!";
    echo 5*7;
    $myname = "Frodo Baggins";
    $myage = 111;
    echo "My name is" . $myname . "and I am " . $myage;

    ?>

    <?php
    $myage = 24;
    if ($myage == "Simon") {
        print "I know you!";
    }
    else {
        print "Who are you?";
    }
    ?>
</p>
</body>

</html>
<?php
echo "I get printed!";
// I don't! I'm a comment.
/* I don’t get printed either
and neither do I */
?>