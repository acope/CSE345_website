<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';
    require 'php_helper/function.php';

    $useremail = $_SESSION['user_email'];

    $movieName = array();
    $movieTime = array();
    $quantity = array();
    $reservationID = array();

    $sql = "SELECT reservation.RESERVATION_ID, user_account.USER_EMAIL, reservation.RESERVATION_TICKETNUM, movie.MOVIE_NAME, showtime.TIME_START
        FROM akcopema.reservation
        JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
        JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
        JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
        JOIN USER_ACCOUNT ON user_account.USER_EMAIL = reservation.user_email
        WHERE reservation.USER_EMAIL = '$useremail'";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab movie times for each movie and insert into time array
    //Create session varaibles for movie names and move ID
    while($row = mysqli_fetch_array($result)){
        array_push($movieName, $row['MOVIE_NAME']);
        array_push($movieTime, $row['TIME_START']);
        array_push($quantity, $row['RESERVATION_TICKETNUM']);
        array_push($reservationID, $row['RESERVATION_ID']);
    }
?>

<table class='table table-bordered movie-table'>
    <thead>
        <tr>
            <th>Movie</th><th>Time</th><th>Quantity</th>
        </tr>
    </thread>

    <tbody>
    
       
    <!-- The Dark Knight -->
   
    <?php
        //If the user is logged in take them to the reservation page
        for($i=0; $i<count($movieName); $i++){
            echo "<tr>";
            echo "<td>$movieName[$i]</td>";
            echo "<td>$movieTime[$i]</td>";
            echo '<td><div class="form-item"><input type="text" name="quantity'.$i.'" required="required" value="'.$quantity[$i].'"></input> </div></td>';
            echo "</tr>";
        }
    ?>  
    


        
   
<?php
    echo "</tbody>";
    echo "</table>";

    // The following is used for testing purposes only
   // session_unset();
  // print_r($_SESSION);
    //echo"</br>";
/*
    var_dump($darkKnight);
    echo "</br>";
    var_dump($darkKnightTimes);
    echo "</br>";
    var_dump($everest);
    echo "</br>";
    var_dump($everestTimes);
    echo "</br>";
    var_dump($interstellar);
    echo "</br>";
    var_dump($interstellarTimes);
    echo "</br>";
    var_dump($bourneIdentity);
    echo "</br>";
    var_dump($bourneIdentityTimes);
    echo "</br>";
    var_dump($planetOfTheApes);
    echo "</br>";
    var_dump($planetOfTheApesTimes);
    // end of testing
*/
    require_once('php_helper/closedb.php');