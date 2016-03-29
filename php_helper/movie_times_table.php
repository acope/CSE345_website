<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';

    $darkKnight = 'The Dark Knight';
    $everest = 'Everest';
    $interstellar = 'Interstellar';
    $bourneIdentity = 'The Bourne Identity';
    $planetOfTheApes = 'Dawn of the Planet of the Apes';
    $movieCount = 0;

    $darkKnightTimes = array();
    $everestTimes = array();
    $interstellarTimes = array();
    $bourneIdentityTimes = array();
    $planetOfTheApesTimes = array();

    $sql = "SELECT MOVIE_NAME, MOVIE_ID, TIME_START
            FROM
            (SELECT SHOWTIME.SHOWTIME_ID, MOVIE.MOVIE_ID, TIME_START, TIME_END, MOVIE_NAME FROM MOVIE_TIMES
            JOIN SHOWTIME ON MOVIE_TIMES.SHOWTIME_ID=SHOWTIME.SHOWTIME_ID
            JOIN MOVIE ON MOVIE.MOVIE_ID = MOVIE_TIMES.MOVIE_ID) AS T1";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab movie times for each movie and insert into time array
    //Create session varaibles for movie names and move ID
    while($row = mysqli_fetch_array($result)){
        $movieName = $row['MOVIE_NAME'];
        $movieTimeStart = $row['TIME_START'];
        $movieID = $row['MOVIE_ID'];
        
        if($movieName == $darkKnight){
            array_push($darkKnightTimes, $movieTimeStart);
            $_SESSION["darkKnightID"] = $movieID;
            $_SESSION["darkKnightMovie"] = $movieName;
        }
        if($movieName == $everest){
            array_push($everestTimes, $movieTimeStart);
            $_SESSION["everestID"] = $movieID;
            $_SESSION["everestMovie"] = $movieName;
        }
        if($movieName == $interstellar){
            array_push($interstellarTimes, $movieTimeStart);
            $_SESSION["interstellarID"] = $movieID;
            $_SESSION["interstellarMovie"] = $movieName;
        }
        if($movieName == $bourneIdentity){
            array_push($bourneIdentityTimes, $movieTimeStart);
            $_SESSION["bourneIdentityID"] = $movieID;
            $_SESSION["bourneIdentityMovie"] = $movieName;
        }
        if($movieName == $planetOfTheApes){
            array_push($planetOfTheApesTimes, $movieTimeStart);
            $_SESSION["planetOfTheApesID"] = $movieID;
            $_SESSION["planetOfTheApesMovie"] = $movieName;
        } 
        
        $movieCount++;
    }
    

    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr>
            <th>Now Playing</th><th>Times</th>
          </tr>";
    echo "</thread>";

    echo "<tbody>";
    //The Dark Knight
    echo "<tr>";
    echo "<td><a  href='movieInfo.php' target='_self' name='DarkKnightMovie'> $darkKnight </a></td>";
    echo "<td>";
    for($i=0; $i<count($darkKnightTimes); $i++){
        echo "<a  href='Reservation.php' target='_self' name='DarkKnightMovie$darkKnightTimes[$i]'> $darkKnightTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Everest
    echo "<tr>";
    echo "<td><a  href='movieInfo.php' target='_self' name='everestMovie'> $everest </a></td>";
    echo "<td>";
    for($i=0; $i<count($everestTimes); $i++){
        echo "<a  href='Reservation.php' target='_self' name='everestMovie$everestTimes[$i]'> $everestTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Interstellar
    echo "<tr>";
    echo "<td><a  href='movieInfo.php' target='_self' name='interstellarMovie'> $interstellar </a></td>";
    echo "<td>";
    for($i=0; $i<count($interstellarTimes); $i++){
        echo "<a  href='Reservation.php' target='_self' name='interstellarMovie$interstellarTimes[$i]'> $interstellarTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";
    
    //The Bourne Identity
    echo "<tr>";
    echo "<td><a  href='movieInfo.php' target='_self' name='bourneIdentityMovie'> $bourneIdentity </a></td>";
    echo "<td>";
    for($i=0; $i<count($bourneIdentityTimes); $i++){
        echo "<a  href='Reservation.php' target='_self' name='bourneIdentityMovie$bourneIdentityTimes[$i]'> $bourneIdentityTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Dawn of the Planet of the Apes
    echo "<tr>";
    echo "<td><a  href='movieInfo.php' target='_self' name='planetOfTheApesMovie'> $planetOfTheApes </a></td>";
    echo "<td>";
    for($i=0; $i<count($planetOfTheApesTimes); $i++){
        echo "<a  href='Reservation.php' target='_self' name='planetOfTheApesMovie$planetOfTheApesTimes[$i]'> $planetOfTheApesTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";
        # TO_DO Populate now playing with array
    


        
   

    echo "</tbody>";
    echo "</table>";

    // The following is used for testing purposes only
   // session_unset();
    print_r($_SESSION);
    echo"</br>";
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