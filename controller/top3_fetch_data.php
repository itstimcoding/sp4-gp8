<?php 

    require "../utilities/database.php";

    if (!function_exists('getConnection')) { 
        $dbcon = open_db_connection();
    }

    $top3_creations_array = null;

    $sql = "SELECT * from creations ORDER BY likes+surprised+question_mark+smart DESC LIMIT 3";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $top3_creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
    
    mysqli_free_result($mysqli_result);
?>

<?php   if(isset($top3_creations_array[1])){
    // sums up total of reactions
    $sum = $top3_creations_array[1]['likes'] + $top3_creations_array[1]['surprised'] + $top3_creations_array[1]['question_mark'] + $top3_creations_array[1]['smart'];
    ?>
<div class="top3-wrapper">
    <a href="creation.php?creation_id=<?php echo $top3_creations_array[1]['id']?>" class="noDecoration">
        <div class="top-two top3_indiv" id="top_3_position_2">
            <h3 class="h3-placing not-selectable">2</h3>
            <img src="uploads/<?php echo $top3_creations_array[1]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $sum?></h4>
                 <!-- checks array for value and only display reaction if it has a value (avoid error) -->
                <?php if (!empty($top3_creations_array[1]['likes'])) { ?>
                    <!-- dynamic_id for animation -->
                    <img src="assets/heart.png" alt="votes" class="" id="likes-<?php echo $top3_creations_array[1]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt="reaction" class="" id="surprised-<?php echo $top3_creations_array[1]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['question_mark'])) { ?>
                    <img src="assets/question_mark.png" alt="reaction" class="" id="question_mark-<?php echo $top3_creations_array[1]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[1]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction" class="" id="smart-<?php echo $top3_creations_array[1]['id']?>">
                <?php } ?> 
            </div>
            
        </div>
    </a>
    <?php } ?>
    <?php if(isset($top3_creations_array[0])){
        $sum = $top3_creations_array[0]['likes'] + $top3_creations_array[0]['surprised'] + $top3_creations_array[0]['question_mark'] + $top3_creations_array[0]['smart']; ?>
    <a href="creation.php?creation_id=<?php echo $top3_creations_array[0]['id']?>" class="noDecoration">
        <div class="top-one top3_indiv" id="top_3_position_1">
            <h3 class="h3-placing not-selectable">1</h3>
            <img src="uploads/<?php echo $top3_creations_array[0]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $sum?></h4>
                <?php if (!empty($top3_creations_array[0]['likes'])) { ?>
                    <img src="assets/heart.png" alt="votes" id="likes-<?php echo $top3_creations_array[0]['id']?>">
                <?php } ?> 
                <?php if (!empty($top3_creations_array[0]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt="reaction" class="" id="surprised-<?php echo $top3_creations_array[0]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[0]['question_mark'])) { ?>
                    <img src="assets/question_mark.png" alt="reaction" class="" id="question_mark-<?php echo $top3_creations_array[0]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[0]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction" class="" id="smart-<?php echo $top3_creations_array[0]['id']?>">
                <?php } ?> 
            </div>
        </div>
    </a>
    <?php } ?>
    <?php if(isset($top3_creations_array[2])){
        $sum = $top3_creations_array[2]['likes'] + $top3_creations_array[2]['surprised'] + $top3_creations_array[2]['question_mark'] + $top3_creations_array[2]['smart']; ?>
    <a href="creation.php?creation_id=<?php echo $top3_creations_array[2]['id']?>" class="noDecoration">
        <div class="top-three top3_indiv" id="top_3_position_3">
            <h3 class="h3-placing not-selectable">3</h3>
            <img src="uploads/<?php echo $top3_creations_array[2]['image_url']?>" alt="Top second creation">
            <div class="reactions">
                <h4><?php echo $sum?></h4>
                <?php if (!empty($top3_creations_array[2]['likes'])) { ?>
                    <img src="assets/heart.png" alt="votes" class="" id="likes-<?php echo $top3_creations_array[2]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[2]['surprised'])) { ?>
                    <img src="assets/surprised.png" alt ="reaction" id="surprised-<?php echo $top3_creations_array[2]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[2]['question_mark'])) { ?>
                    <img src="assets/question_mark.png"alt="reaction" id="question_mark-<?php echo $top3_creations_array[2]['id']?>">
                <?php } ?>
                <?php if (!empty($top3_creations_array[2]['smart'])) { ?>
                    <img src="assets/smart.png" alt="reaction" class="" id="smart-<?php echo $top3_creations_array[2]['id']?>">
                <?php } ?> 
            </div>
            
        </div>
    </a>
    <?php } ?>

   <script>
        
        check_db_new();
              
 
        
   </script>
</div>  