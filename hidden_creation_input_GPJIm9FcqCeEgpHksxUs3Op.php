<?php 

// use complicated url because there is a lack of an account feature and admin feature
require "../utilities/database.php";
$dbcon = open_db_connection();

$sql = "SELECT * from creations ORDER BY created DESC";
$mysqli_result = mysqli_query($dbcon,$sql);
$creations_array = mysqli_fetch_all($mysqli_result,MYSQLI_ASSOC);

mysqli_free_result($mysqli_result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new creation</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font from adobe webproject -->
    <link rel="stylesheet" href="https://use.typekit.net/snv8rol.css">
</head>
<body>

    <h1 class=hidden-h1>API for Unity (of minigames) to insert data into the database</h1>
    <h2 class=hidden-h2>That is why this website is minimally styled</h2>
    <div class="nav-back">
        <a href="index.php">
            <p>Go Back to index.php<p>
        </a>
    </div>
    <div class="create-creation-form">
            <form id="form-wrapper" action="controller/save_new_creation.php" method="POST" enctype="multipart/form-data">
                <div class="image-upload-container">
                    
                    <label for="images" class="drop-container">
                        <span class="drop-area"> </span>
                        <input type="file" name="creation-img" id="creation-img"> 
                    </label>
                </div> 
                <div class="form-input-wrapper">   
                    <label for="creator-name" id="creator-name">Creator Name</label>
                    <input type="text" name="creator-name" placeholder="Add a creator name">
                    <label for="like-count">Like Count </label>
                    <input type="number" name="like-count" placeholder="(number) Add no. of likes">
                    <label for="surprised-count">Suprised reaction Count </label>
                    <input type="number" name="surprised-count" placeholder="(number) Add no. of surprised reactions">
                    <label for="question-mark-count">Question mark reaction Count </label>
                    <input type="number" name="question-mark-count" placeholder="(number) Add no. of question mark reactions">
                    <label for="smart-count">Smart reaction Count </label>
                    <input type="number" name="smart-count" placeholder="(number) Add no. of smart reactions">
                    <input type="submit" id="create-creation-submit" name="submit" value="Submit">
                </div>                  
            </form>
        
    </div>
    <div class="admin-wrapper">
            <h2>View all creation (newest first)</h2>
            <table class="general-table">
                <tr class="list-headers">
                    <td>Creator Name</td>
                    <td>Likes</td>
                    <td>Surpised</td>
                    <td>Smart</td>
                    <td>Image url</td>
                    <td>Created datetime</td>
                </tr>
                <?php foreach($creations_array as $creation){ 
                    // give a different class if user is soft deleted
                        if ($creation['is_deleted']){ ?>
                            <tr class="single-user-row faded" title="user has been soft deleted">    
                    <?php } else { ?>
                            <tr class="single-user-row">
                    <?php } ?>
                                <td class="center"><img class="mini-profile" src="profile_pics/<?php echo $creation['profile_pic'] ?>"/></td>
                                <td><?php echo $creation['name'] ?></td>
                                <td><?php echo $creation['email'] ?></td>
                                <td><?php echo $creation['dob'] ?></td>  
                                <td><a class="hard-delete-btn" href="controller/hard_delete_user.php?id=<?php echo $creation['id']?>"> Perm delete</a></td>
                            </tr>
                <?php } ?>
            </table>
        </div>
</body>
<!-- js script -->
<script src="scripts/main.js"></script>
<script type="text/javascript">
            document.getElementById('creation-img').addEventListener('change', function() {
                const fileName = this.files[0].name;
                document.querySelector('.file-name').textContent = fileName;
            });
        </script>
</html>