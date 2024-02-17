
<?php 
    $host = 'localhost'; 
    $user = 'root';
    $password='';
    $database='sp4_grp8';
    

    function open_db_connection(){
        global $host,$user,$password,$database;
        
        $dbcon = mysqli_connect($host,$user,$password,$database);

        if(mysqli_connect_errno()){ //the PHP global function checks if the mysql connection has errors
            echo "Failed to connect to MySQL: ".mysqli_connect_errno();
            exit(); //this code will stop the script from this line here and will not run any code below
        }
        return $dbcon;
    }


    function close_db_connection($dbcon){
        mysqli_close($dbcon);
    }

    function close_prepared_statement($stmt){
        mysqli_stmt_close($stmt);
    }
   
?>