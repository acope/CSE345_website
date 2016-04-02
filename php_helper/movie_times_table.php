<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';

    $darkKnight = 'The Dark Knight';
    $everest = 'Everest';
    $interstellar = 'Interstellar';
    $bourneIdentity = 'The Bourne Identity';
    $planetOfTheApes = 'Dawn of the Planet of the Apes';
    $movieCount = 0;

    $darkKnightInfo = array();
    $everestInfo = array();
    $interstellarInfo = array();
    $bourneIdentityInfo = array();
    $planetOfTheApesInfo = array();


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
            array_push($darkKnightInfo, $movieID, $movieName, $movieDirector, $movieLeadActor, $movieRating, $movieDescription, $movieYear, $movieRuntime, $movieYoutubeLink);
            $_SESSION["darkKnightInfo"] = $darkKnightInfo;
        }
        if($movieName == $everest){
            array_push($everestTimes, $movieTimeStart);
            array_push($everestInfo, $movieID, $movieName, $movieDirector, $movieLeadActor, $movieRating, $movieDescription, $movieYear, $movieRuntime, $movieYoutubeLink);
            $_SESSION["everestInfo"] = $everestInfo;

        }
        if($movieName == $interstellar){
            array_push($interstellarTimes, $movieTimeStart);
            array_push($interstellarInfo, $movieID, $movieName, $movieDirector, $movieLeadActor, $movieRating, $movieDescription, $movieYear, $movieRuntime, $movieYoutubeLink);
            $_SESSION["interstellarInfo"] = $interstellarInfo;
        }
        if($movieName == $bourneIdentity){
            array_push($bourneIdentityTimes, $movieTimeStart);
            array_push($bourneIdentityInfo, $movieID, $movieName, $movieDirector, $movieLeadActor, $movieRating, $movieDescription, $movieYear, $movieRuntime, $movieYoutubeLink);
            $_SESSION["bourneIdentityInfo"] = $bourneIdentityInfo;
        }
        if($movieName == $planetOfTheApes){
            array_push($planetOfTheApesTimes, $movieTimeStart);
            array_push($planetOfTheApesInfo, $movieID, $movieName, $movieDirector, $movieLeadActor, $movieRating, $movieDescription, $movieYear, $movieRuntime, $movieYoutubeLink);
            $_SESSION["planetOfTheApesInfo"] = $planetOfTheApesInfo;
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
    echo "<td><a  href='movieInfo.php?name=darkKnightMovie' target='_self'> $darkKnight </a></td>";
    echo "<td>";
    for($i=0; $i<count($darkKnightTimes); $i++){
        echo "<a  href='Reservation.php?name=darkKnightMovie&id=$darkKnightTimes[$i]' target='_self'> $darkKnightTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Everest
    echo "<tr>";
    echo "<td><a  href='movieInfo.php?name=everestMovie' target='_self'> $everest </a></td>";
    echo "<td>";
    for($i=0; $i<count($everestTimes); $i++){
        echo "<a  href='Reservation.php?name=everestMovie&id=$everestTimes[$i]' target='_self' > $everestTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Interstellar
    echo "<tr>";
    echo "<td><a  href='movieInfo.php?name=interstellarMovie' target='_self' > $interstellar </a></td>";
    echo "<td>";
    for($i=0; $i<count($interstellarTimes); $i++){
        echo "<a  href='Reservation.phpname=interstellarMovie&id=$interstellarTimes[$i]' target='_self' > $interstellarTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";
    
    //The Bourne Identity
    echo "<tr>";
    echo "<td><a  href='movieInfo.php?name=bourneIdentityMovie' target='_self' > $bourneIdentity </a></td>";
    echo "<td>";
    for($i=0; $i<count($bourneIdentityTimes); $i++){
        echo "<a  href='Reservation.php?name=bourneIdentityMovie&id=$bourneIdentityTimes[$i]' target='_self' > $bourneIdentityTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";

    //Dawn of the Planet of the Apes
    echo "<tr>";
    echo "<td><a  href='movieInfo.php?name=planetOfTheApesMovie' target='_self' > $planetOfTheApes </a></td>";
    echo "<td>";
    for($i=0; $i<count($planetOfTheApesTimes); $i++){
        echo "<a  href='Reservation.php?name=planetOfTheApesMovie&id=$planetOfTheApesTimes[$i]' target='_self'> $planetOfTheApesTimes[$i] </a>";
    }
    echo "</td>";
    echo"</tr>";
        # TO_DO Populate now playing with array
    


        
   

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