<?php 
/*******Name:       Timothy Liong******/
/******Admin No:    221876N***********/

   require "utilities/database.php";

   $dbcon = open_db_connection();
?>


<?php 
    // for testing purposes only
    $creationarray = null;
    $sql = "Select * from creations";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $creationarray = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
    mysqli_free_result($mysqli_result);

    echo "<pre>";
    print_r($creationarray);
    echo "<pre/>";
    exit();

?>


<?php 
   close_db_connection($dbcon);
?>