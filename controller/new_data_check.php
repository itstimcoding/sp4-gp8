<?php

require "../utilities/database.php";
$dbcon = open_db_connection();


$new_id = 0;
$new_vote_assoc = 0;

//setting default values
$isNew = 0;
$creation_id = 0;
$voteType = "vote type is unset";

if (!isset($old_id)){
    $old_id = null;
}

// getting latest id from database
$sql = "SELECT id from vote_logs ORDER BY id DESC LIMIT 1";
$mysqli_result = mysqli_query($dbcon,$sql);
$new_vote_assoc = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);


// set new id as queried id from database's multi-dimensional assoc 
if(empty($new_id)){
    $new_id = $new_vote_assoc[0]["id"];
    
}

// check if id changed
if (!empty($old_id) && $new_id !== $old_id){
    $isNew = 1;
    $creation_id = $new_vote_assoc[0]['creation_id'];
    check_vote_type();

}else{ // if old id not set yet (at start of page) set old id by using current new id
    $old_id = $new_id;
    $isNew = 0;
};

function check_vote_type(){
    global $dbcon, $new_vote_assoc, $voteType;
    if ($new_vote_assoc[0]['is_likes']==1){
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



<input type="hidden" value=<?php echo $isNew ?> id="is_new_vote">
<input type="hidden" value=<?php echo $voteType ?> id="vote_type">
<input type="hidden" value=<?php echo $creation_id ?> id="creation_id">

