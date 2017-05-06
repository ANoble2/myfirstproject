<?php
/**
 * Created by PhpStorm.
 * User: Ashley
 * Date: 06/05/2017
 * Time: 19:36
 */

if ($_SERVER['request_method'] === 'get') {
    ?>
<form action="<?php echo "$_SERVER ['PHP_SELF']";?>" method="post">
    <label>Forename</label>
    <input type="text" name="forname"/>
    <label>Surname</label>
    <input type="text" name="surname"/>
    <input type="submit" value="Go Go Go!"/>
</form>
<?
} elseif ($_SERVER['request_method'] === 'post') {

    $forname = $_POST["forename"];
    $surname= $_POST["surname"];
    echo "Hello {$forname}{$surname}";
}

    ?>