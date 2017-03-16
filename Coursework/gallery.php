<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 16/03/2017
 * Time: 15:28
 */
session_start(); // Start the session
include ('dbConnect.php');// create connection to the database
$upload_dir = 'uploads/'; // specifies the directory where the file is going to be placed
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ashley's Project</title> <!-- title page -->

    <!-- Bootstrap -->
    <link href="material/css/bootstrap.min.css" rel="stylesheet">
    <link href="material/css/bootstrap.css" rel="stylesheet">
    <link href="material/css/lity.css" rel="stylesheet">

    <nav class="navbar navbar-default"> <!-- start of nav bar -->
        <div class="container"> <!-- start of container -->

            <div class="navbar-header"> <!-- start of nav bar header div -->

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <!-- provides collapse button to appear in corner for smaller screens -->
                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span> <!-- three lines appear on collapse button -->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="#">Visual Upload</a> <!-- name of web app in nav bar section -->

            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav"> <!-- section that holds links to other pages-->
                    <li class=""><a href="Home.php">Home</a></li>
                    <li class=""><a href="gallery.php">Image Gallery</a></li>
                    <li class=""><a href="uploadimages.php">Upload Images</a></li>
                    <li class="active"><a href="viewPhotos.php">Control Panel</a></li>
                </ul>


                <form class="navbar-form navbar-right"> <!-- makes contents appear on the right -->
                    Welcome : <?php echo $_SESSION['username']; ?><!-- display logged in users name -->
                    <a href="logout.php" class="btn btn-default" role="button"><span class="glyphicon glyphicon-log-out"></span> Log Out </a> <!-- log out button -->
                </form> <!-- end of form-->

            </div>  <!-- end of nav bar collapse div -->

        </div> <!-- end of container -->
    </nav>  <!-- end of nav bar -->
</head>

<body>

<div class="container">
    <div class="jumbotron">
        <h3 style="text-align:center"><?php echo $_SESSION['username']; ?> Gallery</h3>
    </div>  <!-- end of jumbotron div -->

</div><!-- end of container -->

<div class="gallery">
    <div class="container">

        <?php
        $sql = "select * from tbl_images"; // select all from table tbl_images
        $result = mysqli_query($link, $sql);
        if(mysqli_num_rows($result)){
        while ($row = mysqli_fetch_assoc($result)) {

        echo '<div class="col-md-3">';
        echo '<p>image</p><br>'
            > Changed;next;line;
        $link = $upload_dir . $row['image'];
        ?>


        <div class="row">
            <div class="col-md-3 step">
                <img src="<?php echo $upload_dir . $row['image'] ?>" width="300" height="178">

            </div>


            <?php
            }
            }
            ?>

            <div class="container"
        <hr> <!-- creates line to break up content -->
        <footer class="footer"> <!-- start of footer for page  -->
            <p>&copy; 2017 Ashley Noble</p> <!-- Contents of footer to be displayed on the page-->
        </footer> <!-- end of footer for page  -->
        </div>

    </div> <!-- end of container -->

</div> <!-- end of gallery div -->

<?php
$sql = "select * from tbl_images"; // select all from table tbl_images
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)){
while($row = mysqli_fetch_assoc($result)) {

?>

<?php
$img = $item['image'];
$rows = $result->num_rows;    // Find total rows returned by database
if($rows > 0) {
    $cols = 4;    // Define number of columns
    $counter = 1;     // Counter used to identify if we need to start or end a row
    $nbsp = $cols - ($rows % $cols);    // Calculate the number of blank columns

    $container_class = 'container-fluid';  // Parent container class name
    $row_class = 'row';    // Row class name
    $col_class = 'col-md-4'; // Column class name

    echo '<div class="'.$container_class.'">';    // Container open
    while ($item = $result->fetch_array()) {
        if(($counter % $cols) == 1) {    // Check if it's new row
            echo '<div class="'.$row_class.'">';	// Start a new row
        }

        $img = $item['image'];
        echo '<div class="'.$col_class.'">'.$img.'<h5>'.$item['name'].'</h5></div>';     // Column with content
        if(($counter % $cols) == 0) { // If it's last column in each row then counter remainder will be zero
            echo '</div>';	 //  Close the row
        }
        $counter++;    // Increase the counter
    }
    $result->free();
    if($nbsp > 0) { // Adjustment to add unused column in last row if they exist
        for ($i = 0; $i < $nbsp; $i++)	{
            echo '<div class="'.$col_class.'">&nbsp;</div>';
        }
        echo '</div>';  // Close the row
    }
    echo '</div>';  // Close the container
}
?>

<!-- scripts -->
<script src="material/js/bootstrap.min.js"></script>
<script scr="material/js/bootstrap.js"></script>
<script src="material/js/bootstrap.min.js"></script>
<script src=material/js/galleryjquery.js></script>
<script src=material/js/lity.js></script>

</body>
</html>