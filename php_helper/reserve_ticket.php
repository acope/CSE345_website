<?php 
    require 'php_helper/opendb.php';

    $sql = "INSERT INTO `akcopema`.`reservation`(`RESERVATION_ID`,`USER_EMAIL`,`SHOWTIME_ID`,`RESERVATION_TICKETNUM`,`RESERVATION_CREATION`,`RESERVATION_DATE`)
    VALUES('$email','$showtime_id','$ticket_number','$reservation_creation_date','$reservtion_date');";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

        // Free result set
    mysqli_free_result($result);   
    
    //Close connection
    mysqli_close($conn);
    