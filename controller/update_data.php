<?php
    require "../utilities/database.php";
    $dbcon = open_db_connection();

    $top3_creations_array = null;

    $sql = "SELECT * from creations ORDER BY likes DESC LIMIT 3";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $top3_creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);


    $recent_creations_array = null;

    $sql = "SELECT * from creations ORDER BY created DESC LIMIT 20";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $recent_creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
    
    mysqli_free_result($mysqli_result); // only one since there are two queries
    
?>

<h2>Recently made creations</h2>
<?php foreach($recent_creations_array as $recent_creation) { ?>               
    <img src="uploads/<?php echo $recent_creation['image_url']?>" alt="recent creation"> 

    <?php } ?>

<img src="" alt="">
<img src="" alt="">
<img src="" alt="">
<img src="" alt="">
