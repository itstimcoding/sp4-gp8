// credits : https://api.jquery.com/jQuery.get/
        // gets php to check for new data (id)
        // $.get("controller/new_data_check.php", function(data, status),"json" {
        //     console.log(data.isNew);
        //     console.log($isNew);
        //     console.log('hello world');
            
        //     alert("amogus");
            
        // }, "json" );
        // portion of page only reloads if new data avaliable
        // interval credits : https://crunchify.com/how-to-refresh-div-content-without-reloading-page-using-jquery-and-ajax/


        
        setInterval(function(){
            // if(isNew == 1){
            //     $(".recent-creations").load("controller/update_data.php");    
            // }
        $(".recent-creations").load("controller/recent_fetch_data.php");
        },3000);

        setInterval(function(){
            // if(isNew == 1){
            //     $(".recent-creations").load("controller/update_data.php");    
            // }
                //$(".top-creations").load("controller/top3_fetch_data.php");
        },3000);