<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';

    $darkKnight = 'The Dark Knight';
    $everest = 'Everest';
    $interstellar = 'Interstellar';
    $bourneIdentity = 'The Bourne Identity';
    $planetOfTheApes = 'Dawn of the Planet of the Apes';
    $movieCount = 0;
    $temp = 0;
    
    $darkKnightTimes = array();
    $everestTimes = array();
    $interstellarTimes = array();
    $bourneIdentityTimes = array();
    $planetOfTheApesTimes = array();
    $temp = array("a","b","c","d");

    $sql = "SELECT MOVIE_NAME, TIME_START
            FROM
            (SELECT SHOWTIME.SHOWTIME_ID, MOVIE.MOVIE_ID, TIME_START, TIME_END, MOVIE_NAME FROM MOVIE_TIMES
            JOIN SHOWTIME ON MOVIE_TIMES.SHOWTIME_ID=SHOWTIME.SHOWTIME_ID
            JOIN MOVIE ON MOVIE.MOVIE_ID = MOVIE_TIMES.MOVIE_ID) AS T1";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab movie times for each movie and insert into time array
    while($row = mysqli_fetch_array($result)){
        $movieName = $row['MOVIE_NAME'];
        $movieTimeStart = $row['TIME_START'];
        
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
        
        $movieCount++;
    }

    
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr><th>Now Playing</th><th>Times</th></tr>";
    echo "</thread>";
    //The Dark Knight
    echo "<td><a  href='movieInfo.php' target='_self'> The Dark Knight </a></td>";
        var_dump($darkKnightTimes);   
        # TO_DO Populate now playing with array
    echo "<tbody>";


        
        /*
        if($movieName == $darkKnight){
            array_push($darkKnightTimes, $movieTimeStart);
        }
        */
        
   

    echo "</tbody>";
    echo "</table>";

    require_once('php_helper/closedb.php');