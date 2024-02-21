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
    <title><?php echo $creations_array[0]['creator_name']?>'s Creation</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font from adobe Webproject -->
    <link rel="stylesheet" href="https://use.typekit.net/snv8rol.css">
</head>
<body>
  <h1 class="single-creation-h1">Add a reaction</h1>
  <div class="creation indv">  
  <?php 
  // sums up total reactions (number is used for ranking)
  $sum = $creations_array[0]['likes'] + $creations_array[0]['surprised'] + $creations_array[0]['question_mark'] + $creations_array[0]['smart'];
  ?>
    <div class="top3_indiv creation-page" id="top_3_position_2">
      <img src="uploads/<?php echo $creations_array[0]['image_url']?>" alt="Top second creation" class="not-selectable">
      <div class="reactions creation-page">
          <h4 class ="creation-page"><?php echo "Total Reactions = ".$sum.":"?></h4>
        <div class="emotes">
          <!-- reaction count -->
          <!-- checks array for value and chooses between number and 0 to display (image this time is needed as button so show at all times) -->
          <?php if (!empty($creations_array[0]['likes'])) { ?>
            <p><?php echo $creations_array[0]['likes'] ?></p>  
          <?php } else { ?>
            <p>0</p>
          <?php } ?>
          <!-- image for reaction above -->
          <img src="assets/heart.png" class="" alt="votes">

          <?php if (!empty($creations_array[0]['surprised'])) { ?>
            <p><?php echo $creations_array[0]['surprised'] ?></p>
          <?php } else { ?>
            <p>0</p>
          <?php } ?>
          <img src="assets/surprised.png" class="" alt="reaction">

          <?php if (!empty($creations_array[0]['question_mark'])) { ?>
            <p><?php echo $creations_array[0]['question_mark'] ?></p>
          <?php } else { ?>
            <p>0</p>
          <?php } ?>
          <img src="assets/question_mark.png" class="" alt="reaction">

          <?php if (!empty($creations_array[0]['smart'])) { ?>
            <p><?php echo $creations_array[0]['smart'] ?></p>
          <?php } else { ?>
            <p>0</p>
          <?php } ?>
          <img src="assets/smart.png" class="" alt="reaction">
        </div>
          
      </div>
    
  </div>


  </div>
  

</body>
<script src="scripts/main.js"></script>
</html>