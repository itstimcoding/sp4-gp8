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

<?php   if(isset($top3_creations_array[1])){
    $sum = $top3_creations_array[1]['surprised'] + $top3_creations_array[1]['question_mark'] + $top3_creations_array[1]['smart']
    ?>

<div class="top3-wrapper">
    <a href="top2" class="noDecoration">
        <div class="top-two top3_indiv">
            <h3 class="h3-placing not-selectable">2</h3>
            <img src="uploads/<?php echo $top3_creations_array[1]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $sum?></h4>
                <?php if (!empty($top3_creations_array[1]['likes'])) { ?>
                    <img src="assets/heart.png" alt="votes">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['question_mark'])) { ?>
                    <img src="assets/question_mark.png" alt="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction">
                <?php } ?> 
            </div>
            
        </div>
    </a>
    <?php } ?>
    <?php if(isset($top3_creations_array[0])){?>
    <a href="top3" class="noDecoration">
        <div class="top-one top3_indiv">
            <h3 class="h3-placing not-selectable">1</h3>
            <img src="uploads/<?php echo $top3_creations_array[0]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $top3_creations_array[0]['likes']?></h4>   
                <img src="assets/heart.png"  alt="vote">
                <?php if (!empty($top3_creations_array[0]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[0]['question_mark'])) { ?>
                    <img src="assets/question_mark.png" alt="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[0]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction">
                <?php } ?> 
            </div>
            
        </div>
    </a>
    <?php } ?>
    <?php if(isset($top3_creations_array[2])){?>
    <a href="top1" class="noDecoration">
        <div class="top-three top3_indiv">
            <h3 class="h3-placing not-selectable">3</h3>
            <img src="uploads/<?php echo $top3_creations_array[2]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $top3_creations_array[2]['likes']?></h4>   
                <img src="assets/heart.png"  alt="vote">
                <?php if (!empty($top3_creations_array[2]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt ="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[2]['question_mark'])) { ?>
                    <img src="assets/question_mark.png"alt="reaction">
                <?php } ?>
                <?php if (!empty($top3_creations_array[2]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction">
                <?php } ?> 
            </div>
            
        </div>
    </a>
    <?php } ?>

   
</div> 
</div>   