<?php

include ("init.php");
include("template/header.php");
if (logged_in()) {
    echo 'Welcome, you can now start <a href="create_album.php">create albums</a> and <a href="upload_iamge.php">upload image</a>';
} else {
    echo '<img src="images/landing.png" alt="Register a free account today';
}
?>
    <img src="images/landing.png" alt="Register a free account today">
<?php include("template/footer.php"); ?>