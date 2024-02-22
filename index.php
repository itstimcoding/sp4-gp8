<?php
    // require "utilities/database.php";
    // $dbcon = open_db_connection();
    // if (!function_exists('getConnection')) { 
    //     $dbcon = open_db_connection();
    // }
    //dbcon set in fetch files top3_fetch_data.php and recent_fetch_data.php
    // require "controller/new_data_check.php"; //check only after db connection open
    $isNew = null;
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.typekit.net/wrr3fkp.css">
    <script>

    $(document).ready(function(){
        var isNew = 0;

        function load_top_works(){ // query.load credit : https://api.jquery.com/load/
            if (window.innerWidth>768){
                $(".top-creations").load("controller/top3_fetch_data.php"); // loads file into div specified
            } else {
                $(".top-creations").load("controller/top3_fetch_data(mobile).php");
            };
            
        };
        
        function load_recent_works(){ //  Method Mr Madhan taught, jquery get function
            $.get( "controller/recent_fetch_data.php", function( data ) {
                $("#recent-creations-content").html(data);
            });
        }

        function check_db_new(){
            $.get( "controller/recent_fetch_data.php", function( data ) {
                document.querySelector('#');
            });
            
        }

        // load first instance of top and recent data
        load_top_works();
        load_recent_works();

        //interval credits : https://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
        // setInterval(function(){
        //      load_top_works();
        //      load_recent_works();
        // },3000);       
    });
    </script>
    
    <title>Main page</title>
</head>
<body>
    <img src="assets/background.png" alt="graffiti like wall painting design" class="page-background">
    <div class="homepage">
        <!-- data is inserted using ajax call (using included caused problems such as the path required for database.php changing) -->
        <h1 class="big-header not-selectable">Top Creations</h1>
        <div class="top-creations">          
        </div>
        <h2 class = "recent-h2 not-selectable">Recently made creations</h2>
        <div class="recent-creations">   
            <div id="recent-creations-content">
        </div>

        <div style="display:none;" id="">

        </div>
    </div>
    </div>
    

    
    
</body>
</html> 