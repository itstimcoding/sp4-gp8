<?php 
    session_start();
    require "../utilities/database.php";
    $dbcon = open_db_connection();

   
    $creation_id = null;
    $like = 0;
    $surprised = 0;
    $question_mark = 0;
    $smart = 0;

    if ($_SERVER['REQUEST_METHOD']=='GET') {
        
       
        $creation_id = $_GET['creation_id'];
        $type = $_GET['type'];
        $update_status = update_vote($creation_id, $type); 

        // type is for the like of reaction / vote
        // it needs to be differentiated because that is how we can target a specific post to display an animation there
        if ($type == 'likes'){
            $like = 1;
        } else if ($type == 'surprised') {
            $surprised = 1;
        } else if ($type == 'question_mark'){
            $question_mark = 1;
        } else if (($type == 'smart')){
            $smart = 1;
        } else {
            header("Location: ../creation.php?creation_id=".$creation_id."&error=invalid_type"); //used to redirect in browser
            exit();
        }

        $create_status = create_vote_log($creation_id);


        if($update_status && $create_status){
            header("Location: ../creation.php?creation_id=".$creation_id."&vote=success"); //used to redirect in browser
            exit();
        }else{
            header("Location: ../creation.php?creation_id=".$creation_id."&vote=failed"); 
            exit();
        }
    }

    // update creations table with type(likes, surprised, ..etc) and creator_id from get
    function update_vote($creation_id,$type){
        global $dbcon;
        $sql = "UPDATE creations SET $type = $type + 1  WHERE id={$creation_id}";
        $mysqli_result = mysqli_query($dbcon,$sql);
        return $mysqli_result;
    }

    // save/ log whether the vote is surprised,liked, question_mark or smart emotes
    // since type of vote can only be inserted into the db at once, we can use is_"a type of vote/reaction" to identify the vote
    function create_vote_log($creation_id){
        global $dbcon, $like, $surprised, $question_mark, $smart;
        $sql = "INSERT INTO vote_logs (creation_id, is_like, is_surprised, is_question_mark, is_smart)";
        $sql = $sql." VALUES('{$creation_id}','{$like}','{$surprised}','{$question_mark}','{$smart}')";
        $mysqli_result = mysqli_query($dbcon,$sql);
        return $mysqli_result;

    }

    close_db_connection($dbcon);

   


?>