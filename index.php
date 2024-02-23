<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="scripts/main.js"></script>
    <link rel="stylesheet" href="https://use.typekit.net/wrr3fkp.css">
    <script>

    $(document).ready(function(){
        //put check_db_new() function in main.js so that top3_fetch_data can access it
        // because somehow only top3 fetch will be able to do classList.add for one of the top3_fetch_data.php elements.

        //load first instance
        load_top_works();
        load_recent_works();
        //interval credits : https://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/
        setInterval(function(){
            load_top_works();
            load_recent_works();
        },1000);       
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
            <div id="recent-creations-content"></div>
        </div>
        
    </div>
    <div id="check" style="display: none;"></div>

    
    
</body>
</html> 