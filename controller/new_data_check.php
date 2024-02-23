<?php

session_start();
require "../utilities/database.php";
$dbcon = open_db_connection();

// old Id is like the Id from the previous time this code has ran
$new_id = 0;
$new_vote_assoc = 0;
$old_id = 0;

//setting default values
$isNew = 0;
$creation_id = 0;
$voteType = "voteTypeisUnset";

if (!isset($_SESSION['old_id'])){
    $old_id = null;
} else {
    $old_id = $_SESSION['old_id'];
}

// getting latest id from database
$sql = "SELECT * from vote_logs ORDER BY id DESC LIMIT 1";
$mysqli_result = mysqli_query($dbcon,$sql);
$new_vote_assoc = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);


// set new id as queried id from database's multi-dimensional assoc 
if(empty($new_id)){
    $new_id = $new_vote_assoc[0]["id"];
};


// check if id changed
if (!empty($old_id) && $new_id !== $old_id){
    $isNew = 1;
    $creation_id = $new_vote_assoc[0]['creation_id'];
    //update old id to become new id for next cycle
    $old_id = $new_id;

    // save id for next session as old id
    $_SESSION['old_id'] = $old_id;

    // check vote type and set variable to $voteType
    check_vote_type();

}else{ // if old id not set yet (at start of page) set old id by using current new id
    $old_id = $new_id;
    
    $isNew = 0;
    $_SESSION['old_id'] = $old_id;
};

function check_vote_type(){
    global $dbcon, $new_vote_assoc, $voteType;
    if ($new_vote_assoc[0]['is_like']==1){
        $voteType = "likes";
    } else if ($new_vote_assoc[0]['is_surprised']==1){
        $voteType = "surprised";
    } else if ($new_vote_assoc[0]['is_question_mark']==1){
        $voteType = "question_mark";
    } else if ($new_vote_assoc[0]['is_smart']==1){
        $voteType = "smart";
    } 
}



?>


<input type="hidden" value=<?php echo $old_id ?> id="old_id">
<input type="hidden" value=<?php echo $new_id ?> id="new_id">

<input type="hidden" value=<?php echo $isNew ?> id="is_new_vote">
<input type="hidden" value=<?php echo $voteType ?> id="vote_type">
<input type="hidden" value=<?php echo $creation_id ?> id="creation_id">


