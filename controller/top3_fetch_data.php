<?php 

    require "../utilities/database.php";

    if (!function_exists('getConnection')) { 
        $dbcon = open_db_connection();
    }

    $top3_creations_array = null;

    $sql = "SELECT * from creations ORDER BY likes DESC LIMIT 3";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $top3_creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);

    mysqli_free_result($mysqli_result);
?>


<div class="top3-wrapper">
    <a href="top2">
        <div class="top-two">
            <h3>2</h3>
            <a href="top2"><img src="<?php echo $top3_creations_array[1]['image_url']?>" alt="Top second creation"></a>
            <h4><?php echo $top3_creations_array[1]['likes']?></h4>
            <img src="vote" alt="vote">
            <img src="others" alt="reaction">
            <img src="... more" alt="other reactions">
        </div>
    </a>
    <a href="top1">
    <div class="top-one">
        <h2>1</h2>
        <a href="top1"><img src="<?php echo $top3_creations_array[0]['image_url']?>" alt="Top creation"></a>
        <div class="reactions">
            <h3><?php echo $top3_creations_array[0]['likes']?></h3>
            <img src="vote" alt="vote">
            <img src="others" alt="reaction">
            <img src="... more" alt="other reactions">  
        </div>
    </div>
    </a>
    
    <a href="top3">
        <div class="top-three">
            <h3>2</h3>
            <a href="top3"><img src="<?php echo $top3_creations_array[2]['image_url']?>" alt="Top third creation"></a>
            <h4><?php echo $top3_creations_array[2]['likes']?></h4>
            <img src="vote" alt="vote">
            <img src="others" alt="reaction">
            <img src="... more" alt="other reactions">
        </div>
    </a>

   
</div> 
</div>   