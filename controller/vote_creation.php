<?php 
    session_start();
    require "../utilities/database.php";
    $dbcon = open_db_connection();

   
    $creation_id = null;

    if ($_SERVER['REQUEST_METHOD']=='GET') {
        
       
        $creation_id = $_GET['creation_id'];
        $status = update_vote($creation_id); 
        
        create_vote_log($creation_id);


        /*****if($status==true){
            header("Location: ../admin_view_users.php?soft_delete=success"); //used to redirect in browser
            exit();
        }else{
            header("Location: ../admin_view_users.php?soft_delete=failure"); //used to redirect in browser
            exit();
        }**********/
    }

    function update_vote($creation_id){
        global $dbcon;
        $sql = "UPDATE creations SET likes = likes + 1  WHERE id={$creation_id}";
        $mysqli_result = mysqli_query($dbcon,$sql);
        return $mysqli_result;
    }

    function create_vote_log($creation_id){
        global $dbcon;
        $sql = "INSERT INTO vote_logs (creation_id)";
        $sql = $sql." VALUES('{$creation_id}')";
        $mysqli_result = mysqli_query($dbcon,$sql);
        return $mysqli_result;

    }

    close_db_connection($dbcon);

   


?>