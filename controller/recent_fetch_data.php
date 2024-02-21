
<?php
    require "../utilities/database.php";
    if (!function_exists('getConnection')) { 
        $dbcon = open_db_connection();
    }

    $sql = "SELECT * from creations ORDER BY created DESC LIMIT 20";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $recent_creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
    
    mysqli_free_result($mysqli_result); // only one since there are two queries

?>

<?php foreach($recent_creations_array as $recent_creation) { ?>
    <a href="creation.php?creation_id=<?php echo $recent_creation['id']?>"> 
        <div class="recent">
            <img src="uploads/<?php echo $recent_creation['image_url']?>" alt="recent creation"> 
            <div class="recent-reactions">
                <h5><?php echo $recent_creation['likes']?> reacts</h5>
                <h5><?php echo time_elapsed_string($recent_creation['created'])?></h5>
            </div>
        </div>  
    </a>   
<?php } ?>




