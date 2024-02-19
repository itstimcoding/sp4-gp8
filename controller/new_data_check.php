<?php

require "../utilities/database.php";
$dbcon = open_db_connection();

$isNew = 0;
$old_id= 0;
$new_id = 0;

// getting latest id from database
$sql = "SELECT id from creations ORDER BY DESC";
$mysqli_result = mysqli_query($dbcon,$sql);
$new_id_assoc = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);

// set new id as queried id from database's multi-dimensional assoc 
$new_id = $new_id_assoc[0]["id"];

// check if id changed
if ($new_id !== $old_id){
    $isNew = 1; 
    echo json_encode($isNew);
};
