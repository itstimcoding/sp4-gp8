<?php 

// use complicated url because there is a lack of an account feature and admin feature
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new post - Sharecipe</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font from adobe webproject -->
    <link rel="stylesheet" href="https://use.typekit.net/snv8rol.css">
</head>
<body>
    <?php include 'includes/navi.php'; ?>
    
    <div class="nav-back">
        <a href="index.php">
            <img src="assets/back_arrow_left.svg" alt="Go --Back button">
            Go Back
        </a>
    </div>
    <div class="create-post-form">
            <form id="form-wrapper" action="controller/save_new_creation.php" method="POST" enctype="multipart/form-data">
                <div class="image-upload-container">
                    
                    <label for="images" class="drop-container" onclick="document.getElementById('post-img').click()";>
                        <span class="drop-area"> </span>
                        <input type="file" name="post-img" id="post-img">
                        <img src="assets/Add file icon.png" alt="Upload image button">
                        <span>Upload an Image</span>
                        
                        <!-- Took away "drag and drop" because it doesn't work -->
                        <h3>Choose a file</h3>
                    </label>
                </div> 
                <div class="text-input-wrapper">   
                    <label for="title" id="title"> Title</label>
                    <input type="text" name="title" placeholder="Add a title">
                    <label for="tag"> Tag </label>
                    <input type="text" name="tag" placeholder="Add a tag">
                    <label for="description" id="description">Description (eg. Recipes / Opinions)</label>
                    
                    <!-- weird bug where placeholder does not appear when textarea tag is not ending on the same line -->
                    <textarea name="description" placeholder="Write post description" rows="4" cols="500"></textarea>
                    <input type="submit" id="create-post-submit" name="submit" value="Submit">
                </div>                  
            </form>
        
    </div>
</body>
<!-- js script -->
<script src="scripts/main.js"></script>
<script type="text/javascript">
            document.getElementById('post-img').addEventListener('change', function() {
                const fileName = this.files[0].name;
                document.querySelector('.file-name').textContent = fileName;
            });
        </script>
</html>