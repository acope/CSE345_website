<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';
    require 'php_helper/function.php';

    $darkKnightTimes = array();
    $everestTimes = array();
    $interstellarTimes = array();
    $bourneIdentityTimes = array();
    $planetOfTheApesTimes = array();

    $sql = "SELECT * FROM
(SELECT SHOWTIME.SHOWTIME_ID, MOVIE.MOVIE_ID, MOVIE.MOVIE_NAME, MOVIE.MOVIE_DIRECTOR, MOVIE.MOVIE_LEAD_ACTOR, MOVIE.MOVIE_RATING, MOVIE.MOVIE_DESCRIPTION, MOVIE.MOVIE_YEAR, MOVIE.MOVIE_RUNTIME, MOVIE.MOVIE_YOUTUBE, TIME_START FROM MOVIE_TIMES
JOIN SHOWTIME ON MOVIE_TIMES.SHOWTIME_ID=SHOWTIME.SHOWTIME_ID
JOIN MOVIE ON MOVIE.MOVIE_ID = MOVIE_TIMES.MOVIE_ID) AS T1";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab movie times for each movie and insert into time array
    //Create session varaibles for movie names and move ID
    while($row = mysqli_fetch_array($result)){
        $movieName = $row['MOVIE_NAME'];
        $movieTimeStart = $row['TIME_START'];
        $movieID = $row['MOVIE_ID'];
        $movieDirector = $row['MOVIE_DIRECTOR'];
        $movieLeadActor = $row['MOVIE_LEAD_ACTOR'];
        $movieRating = $row['MOVIE_RATING'];
        $movieDescription = $row['MOVIE_DESCRIPTION'];
        $movieYear = $row['MOVIE_YEAR'];
        $movieRuntime = $row['MOVIE_RUNTIME'];
        $movieYoutubeLink = $row['MOVIE_YOUTUBE'];
        
        if($movieName == $darkKnight){
            array_push($darkKnightTimes, $movieTimeStart);
        }
        if($movieName == $everest){
            array_push($everestTimes, $movieTimeStart);
        }
        if($movieName == $interstellar){
            array_push($interstellarTimes, $movieTimeStart);
        }
        if($movieName == $bourneIdentity){
            array_push($bourneIdentityTimes, $movieTimeStart);
        }
        if($movieName == $planetOfTheApes){
            array_push($planetOfTheApesTimes, $movieTimeStart);
        } 
    }
?>

<table class='table table-bordered'>
    <thead>
        <tr>
            <th>Now Playing</th><th>Times</th>
        </tr>
    </thread>

    <tbody>
    
       
    <!-- The Dark Knight -->
    <tr>
    <?php
        //If the user is logged in take them to the reservation page
        if($_SESSION['loggedin'] == 1){    
            echo "<td><a  href='movieInfo.php?name=$darkKnight' target='_self'> $darkKnight </a></td>";    
            echo "<td>";
                for($i=0; $i<count($darkKnightTimes); $i++){
                    echo "<a  href='Reservation.php?name=$darkKnight&id=$darkKnightTimes[$i]' target='_self'> $darkKnightTimes[$i] </a>";
                }
            echo "</td>";
        //else take them to the log in page then to the reservation page    
        }else{
            echo "<td><a  href='movieInfo.php?name=$darkKnight' target='_self'> $darkKnight </a></td>";    
            echo "<td>";
                for($i=0; $i<count($darkKnightTimes); $i++){
                    echo "<a  href='login.php?name=$darkKnight&id=$darkKnightTimes[$i]' target='_self'> $darkKnightTimes[$i] </a>";
                }
            echo "</td>";
        }
    ?>  
    </tr>

    <!-- Everest -->
    <tr>
    <?php  
        //If the user is logged in take them to the reservation page
        if($_SESSION['loggedin'] == 1){  
            echo "<td><a  href='movieInfo.php?name=$everest' target='_self'> $everest </a></td>";
            echo "<td>";
                for($i=0; $i<count($everestTimes); $i++){
                    echo "<a  href='Reservation.php?name=$everest&id=$everestTimes[$i]' target='_self' > $everestTimes[$i] </a>";
                }
            echo "</td>";
        //else take them to the log in page then to the reservation page    
        }else{    
            echo "<td><a  href='movieInfo.php?name=$everest' target='_self'> $everest </a></td>";
            echo "<td>";
                for($i=0; $i<count($everestTimes); $i++){
                    echo "<a  href='login.php?name=$everest&id=$everestTimes[$i]' target='_self' > $everestTimes[$i] </a>";
                }
            echo "</td>";
        }
    ?>    
    </tr>

    <!-- Interstellar -->
    <tr>
    <?php
        //If the user is logged in take them to the reservation page
        if($_SESSION['loggedin'] == 1){  
            echo "<td><a  href='movieInfo.php?name=$interstellar' target='_self' > $interstellar </a></td>";
            echo "<td>";
                for($i=0; $i<count($interstellarTimes); $i++){
                    echo "<a  href='Reservation.php?name=$interstellar&id=$interstellarTimes[$i]' target='_self' > $interstellarTimes[$i] </a>";
                }
            echo "</td>";
        //else take them to the log in page then to the reservation page    
        }else{  
            echo "<td><a  href='movieInfo.php?name=$interstellar' target='_self' > $interstellar </a></td>";
            echo "<td>";
                for($i=0; $i<count($interstellarTimes); $i++){
                    echo "<a  href='login.php?name=$interstellar&id=$interstellarTimes[$i]' target='_self' > $interstellarTimes[$i] </a>";
                }
            echo "</td>"; 
        }
    ?>    
    </tr>
    
    <!-- The Bourne Identity -->
    <tr>
    <?php
        //If the user is logged in take them to the reservation page
        if($_SESSION['loggedin'] == 1){  
            echo "<td><a  href='movieInfo.php?name=$bourneIdentity' target='_self' > $bourneIdentity </a></td>";
            echo "<td>";
                for($i=0; $i<count($bourneIdentityTimes); $i++){
                    echo "<a  href='Reservation.php?name=$bourneIdentity&id=$bourneIdentityTimes[$i]' target='_self' > $bourneIdentityTimes[$i] </a>";
                }
            echo "</td>";
        //else take them to the log in page then to the reservation page    
        }else{  
            echo "<td><a  href='movieInfo.php?name=$bourneIdentity' target='_self' > $bourneIdentity </a></td>";
            echo "<td>";
                for($i=0; $i<count($bourneIdentityTimes); $i++){
                    echo "<a  href='login.php?name=$bourneIdentity&id=$bourneIdentityTimes[$i]' target='_self' > $bourneIdentityTimes[$i] </a>";
                }
            echo "</td>";
        }
    ?>
    </tr>

    <!-- Dawn of the Planet of the Apes -->
    <tr>
    <?php 
        if($_SESSION['loggedin'] == 1){ 
            echo "<td><a  href='movieInfo.php?name=$planetOfTheApes' target='_self' > $planetOfTheApes </a></td>";
            echo "<td>";
                for($i=0; $i<count($planetOfTheApesTimes); $i++){
                    echo "<a  href='Reservation.php?name=$planetOfTheApes&id=$planetOfTheApesTimes[$i]' target='_self'> $planetOfTheApesTimes[$i] </a>";
                }
            echo "</td>";
        //else take them to the log in page then to the reservation page    
        }else{     
            echo "<td><a  href='movieInfo.php?name=$planetOfTheApes' target='_self' > $planetOfTheApes </a></td>";
            echo "<td>";
                for($i=0; $i<count($planetOfTheApesTimes); $i++){
                    echo "<a  href='login.php?name=$planetOfTheApes&id=$planetOfTheApesTimes[$i]' target='_self'> $planetOfTheApesTimes[$i] </a>";
                }
            echo "</td>"; 
        }
    ?>    
    </tr>
    


        
   
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