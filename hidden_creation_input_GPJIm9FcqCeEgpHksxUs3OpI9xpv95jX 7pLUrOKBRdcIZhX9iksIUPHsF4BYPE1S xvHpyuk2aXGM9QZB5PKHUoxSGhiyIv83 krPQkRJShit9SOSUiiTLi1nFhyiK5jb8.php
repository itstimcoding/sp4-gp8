<?php 

// use complicated url because there is a lack of an account feature and admin feature
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

    <div class="nav-back">
        <a href="index.php">
            <img src="assets/back_arrow_left.svg" alt="Go --Back button">
            Go Back
        </a>
    </div>
    <div class="create-creation-form">
            <form id="form-wrapper" action="controller/save_new_creation.php" method="POST" enctype="multipart/form-data">
                <div class="image-upload-container">
                    
                    <label for="images" class="drop-container" onclick="document.getElementById('creation-img').click()";>
                        <span class="drop-area"> </span>
                        <input type="file" name="creation-img" id="creation-img">
                        <img src="assets/Add file icon.png" alt="Upload image button">
                        <span>Upload an Image</span>
                        
                        <!-- Took away "drag and drop" because it doesn't work -->
                        <h3>Choose a file</h3>
                    </label>
                </div> 
                <div class="text-input-wrapper">   
                    <label for="creator-name" id="creator-name">Creator Name</label>
                    <input type="text" name="creator-name" placeholder="Add a creator name">
                    <label for="like-count">Like Count </label>
                    <input type="text" name="like-count" placeholder="Add no. of likes">
                    <label for="surprised-count">Suprised reaction Count </label>
                    <input type="text" name="surprised-count" placeholder="Add no. of surprised reactions">
                    <label for="question-mark-count">Question mark reaction Count </label>
                    <input type="text" name="question-mark-count" placeholder="Add no. of question mark reactions">
                    <label for="smart-count">Smart reaction Count </label>
                    <input type="text" name="smart-count" placeholder="Add no. of smart reactions">

                    <input type="submit" id="create-creation-submit" name="submit" value="Submit">
                </div>                  
            </form>
        
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