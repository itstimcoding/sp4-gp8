<?php
/*******Name:       Timothy Liong******/
/******Admin No:    221876N***********/

require "../utilities/database.php";

$dbcon = open_db_connection();


$creator_name = null;
$likes = null;
$surpised = null;
$creation_img = null;
$smart = null;
$target_dir = "uploads/";
$target_file = null; //the name of the image that is uploaded in the uploads folder
$db_file = null; //file format saved to database (doesn't have file directory)

//check if the request is a post 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $creator_name = $_POST['creator_name'];
    $likes = $_POST['likes'];
    $surpised = $_POST['surpised'];
    $smart = $_POST['smart'];
    $creation_img = $_FILES['post-img'];
    if (empty($creation_img)) {
        $creation_img = 'rock-n-roll-monkey-LEPhZkQbUrk-unsplash.jpg.png';
    }

    
    

    $status_to_save_image = save_to_uploads_folder();
    $status = save_new_creation(); //call the function that saves the data

    mysqli_close($dbcon); //close database connection once all required sql statements are run

    if($status==true && $status_to_save_image==true){
        header("Location: ../index.php?submission=success"); 
        exit();
    }else{
        header("Location: ../index.php?submission=failure"); 
        exit();
    }
}



function save_new_creation(){
    
    global $dbcon;

    global $creator_name , $likes ,$surpised, $smart, $creation_img, $db_file; 

    $sql = "INSERT INTO creations (creator_name, likes, surpised, smart, image)";
    $sql = $sql." VALUES('{$creator_name}','{$likes}','{$surpised}','{$smart}','{$db_file}')";
    $mysqli_result = mysqli_query($dbcon,$sql);
    return $mysqli_result;
}    

function save_to_uploads_folder(){
    global $target_file, $target_dir, $db_file;

    $filename = null;
    $ext = null;
    $unique_id = null;
   
    $filename = pathinfo($_FILES['post-img']['name'], PATHINFO_FILENAME);
    $ext = pathinfo($_FILES["post-img"]["name"],PATHINFO_EXTENSION);
    $unique_id = time();
    $target_file =$target_dir.$filename."_".$unique_id.".".$ext;
    $db_file = $filename."_".$unique_id.".".$ext;

    if (move_uploaded_file($_FILES["post-img"]["tmp_name"], "../".$target_file)) {
        return true;
    }else{
        return false;
    }
}