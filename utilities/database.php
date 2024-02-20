
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

    // Calculate time elapsed

    //credit = https://stackoverflow.com/questions/1416697/converting-timestamp-to-time-ago-in-php-e-g-1-day-ago-2-days-ago
    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $then = new DateTime( $datetime );
        $diff = (array) $now->diff( $then );

        $diff['w']  = floor( $diff['d'] / 7 );
        $diff['d'] -= $diff['w'] * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );

        foreach( $string as $k => & $v )
        {
            if ( $diff[$k] )
            {
                $v = $diff[$k] . ' ' . $v .( $diff[$k] > 1 ? 's' : '' );
            }
            else
            {
                unset( $string[$k] );
            }
        }

        if ( ! $full ) $string = array_slice( $string, 0, 1 );
        return $string ? implode( ', ', $string ) . ' ago' : 'just now';
     }

   
?>