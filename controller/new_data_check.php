<?php

require "../utilities/database.php";
$dbcon = open_db_connection();

$isNew = 0;
$new_id = 0;
$new_id_assoc = 0;

if (!isset($old_id)){
    $old_id = null;
}

// getting latest id from database
$sql = "SELECT id from vote_logs ORDER BY id DESC LIMIT 1";
$mysqli_result = mysqli_query($dbcon,$sql);
$new_id_assoc = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
echo "<pre>";
print_r($new_id_assoc);
echo "</pre>";


// set new id as queried id from database's multi-dimensional assoc 
if(empty($new_id)){
    $new_id = $new_id_assoc[0]["id"];
    echo $new_id;
}

// check if id changed
if (!empty($old_id) && $new_id !== $old_id){
    $isNew = 1; 
}else{ // if old id not set yet (at start of page) set old id by using current new id
    $old_id = $new_id;
    $isNew = 0;
};
?>

<input type="hidden" value=<?php echo $isNew ?> id="new_vote_id">