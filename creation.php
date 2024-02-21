<?php 
/*******Name:       Timothy Liong******/
/******Admin No:    221876N***********/

  require "utilities/database.php";
  $dbcon = open_db_connection(); 

  $creationarray = null;
  $creation = null;

  // Gets creation id clicked through GET method
  if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id = $_GET['creation_id'];
    // queries databse to get creation
    $sql = "SELECT * from creations WHERE id = '{$id}'";
    $mysqli_result = mysqli_query($dbcon,$sql);
    $creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);
    mysqli_free_result($mysqli_result);


  } else {
    // redirect if creation is not avaliable
    header("Location: ../index.php?creation_retrieval_failed");
    exit();
  }
    // calculate how long the creation was created ago
    $when = $creations_array[0]['created'];
    $time_ago = time_elapsed_string($when);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $creation_array[0]['title']?> - Sharecipe</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font from adobe Webproject -->
    <link rel="stylesheet" href="https://use.typekit.net/snv8rol.css">
</head>
<body>
  Vote
  <div class="creations indv">  
  <?php 
  $sum = $creations_array[0]['likes'] + $creations_array[0]['surprised'] + $creations_array[0]['question_mark'] + $creations_array[0]['smart'];
  ?>
    <div class="top3_indiv" id="top_3_position_2">
    <h3 class="h3-placing not-selectable">2</h3>
    <img src="uploads/<?php echo $creations_array[0]['image_url']?>" alt="Top second creation">
    <div class="reactions">
        <h4><?php echo $sum?></h4>
        <?php if (!empty($creations_array[0]['likes'])) { ?>
            <img src="assets/heart.png" class="slide-out-top" alt="votes">
        <?php } ?>
        <?php if (!empty($creations_array[0]['surprised'])) { ?>
            <img src="assets/surprised.png" alt="reaction">
        <?php } ?>
        <?php if (!empty($creations_array[0]['question_mark'])) { ?>
            <img src="assets/question_mark.png" alt="reaction">
        <?php } ?>
        <?php if (!empty($creations_array[0]['smart'])) { ?>
            <img src="assets/smart.png" alt="reaction">
        <?php } ?>
    </div>
    
  </div>


  </div>
  

</body>
<script src="scripts/main.js"></script>
</html>