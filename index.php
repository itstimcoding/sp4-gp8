<?php
    require "utilities/database.php";
    require "controller/new_data_check.php";
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

    echo "<pre>";
    print_r($recent_creations_array);
    echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>

    $(document).ready(function(){
        var isNew = 0;

        // credits : https://api.jquery.com/jQuery.get/
        // gets php to check for new data (id)
        $.get( "controller/new_data_check.php", function( data ) {
            console.log(data)
            console.log($isNew)
        }, "json" );

        console.log("documentready");
        // portion of page only reloads if new data avaliable
        // interval credits : https://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
        setInterval(function(){
            if(isNew == 1){
                $(".recent-creations").load("controller/update_data.php");    
            }
        },3000);
    });
    </script>
    
    <title>Main page</title>
</head>
<body>
    <h1>Top Creations</h1>
    <button>update</button>
    <div class="top-one">
        <h2>1</h2>
        <a href="top1"><img src="" alt="Top creation"></a>
        <h3>14</h3>
        <img src="vote" alt="vote">
        <img src="others" alt="reaction">
        <img src="... more" alt="other reactions">
    </div>
    <div class="top-recent-qrcode-wrapper">
        <a href="top2">
            <div class="top-two">
                <h3>2</h3>
                <a href="top2"><img src="" alt="Top second creation"></a>
                <h4>14</h4>
                <img src="vote" alt="vote">
                <img src="others" alt="reaction">
                <img src="... more" alt="other reactions">
            </div>
        </a>
        <a href="top3">
            <div class="top-three">
                <h3>2</h3>
                <a href="top3"><img src="" alt="Top third creation"></a>
                <h4>14</h4>
                <img src="vote" alt="vote">
                <img src="others" alt="reaction">
                <img src="... more" alt="other reactions">
            </div>
        </a>
        <div class="qr-code">
            <h2>Vote for your favourite creations!</h2>
            <img src="" alt="qr code for voting">
        </div>
        <div class="recent-creations">
            <h2>Recently made creations</h2>
            <?php foreach($recent_creations_array as $recent_creation) { ?>               
                <img src="uploads/<?php echo $recent_creation['image_url']?>" alt="recent creation"> 
            
                <?php } ?>
            
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
        </div>
    </div>
    
    
</body>
</html>