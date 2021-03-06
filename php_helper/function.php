<?php

// This file will be used for varying functions
/*
*Global variable movie names
*/
$darkKnight = 'The Dark Knight';
$everest = 'Everest';
$interstellar = 'Interstellar';
$bourneIdentity = 'The Bourne Identity';
$planetOfTheApes = 'Dawn of the Planet of the Apes';

/*
*returns likes for movie thumbnails
*/
function getMovieThumbnail($movieName){

    switch($movieName) {
        case $GLOBALS['darkKnight']:  
            $url = "http://www.hobiplanet.com/blog/wp-content/gallery/batman_darkknight02/bane_04.jpg";
            break;        
        case $GLOBALS['everest']:
            $url = "http://s1.cinema.com/image_lib/13843_poster.jpg";
            break;           
        case $GLOBALS['interstellar']:
            $url = "http://image.tmdb.org/t/p/original/Aik3rm4drM9ePSxAVejYVLAmoDX.jpg";
            break;
        case $GLOBALS['bourneIdentity']:
            $url = "http://image.tmdb.org/t/p/original/gLN10sdrhlYfnlsPHWVfXiZ7nxj.jpg";
            break;
        case $GLOBALS['planetOfTheApes']:
            $url = "http://www.nerdly.co.uk/wp-content/uploads/2014/07/dawn-of-the-planet-of-the-apes.jpg";
            break;
        default:
            $url = "";
    }

    return $url; 
}


/*
* Grabs all of the movie information depending on the movie name
*Indexs: [0]=>Movie ID [1]=>MovieName [2]=>Movie Director [3]=>Movie Lead Actor [4]=>Movie Rating 
*[5]=>Movie Rating [6]=>Movie Description [7]=>Movie Year [8]=>Movie Runtime [9]=>Movie Youtube
*/
function getMovieInformation($movieName){
    require 'php_helper/opendb.php';
    
    //Grab all of the movies
    $sql = "SELECT * FROM movie WHERE MOVIE_NAME='$movieName'";
    
    //Create search query
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
    //Grab Associative array
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        
    $movieInfo = array($row['MOVIE_ID'], $row['MOVIE_NAME'], $row['MOVIE_DIRECTOR'], $row['MOVIE_LEAD_ACTOR'], $row['MOVIE_RATING'], $row['MOVIE_DESCRIPTION'], $row['MOVIE_YEAR'], $row['MOVIE_RUNTIME'], $row['MOVIE_YOUTUBE']);
   
        // Free result set
    mysqli_free_result($result);   
    
    //Close connection
    mysqli_close($conn);
    
    return $movieInfo;
}

function getMovieTimes($movieName){
    require 'php_helper/opendb.php';
    
    $movieTimes = array();
    
    $sql = "SELECT * FROM
(SELECT showtime.SHOWTIME_ID, movie.MOVIE_ID, movie.MOVIE_NAME, TIME_START FROM movie_times
JOIN showtime ON movie_times.SHOWTIME_ID=showtime.SHOWTIME_ID
JOIN movie ON movie.MOVIE_ID = movie_times.MOVIE_ID) AS t1 WHERE MOVIE_NAME = '$movieName'";

    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab movie times for each movie and insert into time array
    //Create session varaibles for movie names and move ID
    while($row = mysqli_fetch_array($result)){
        array_push($movieTimes, $row['TIME_START']); 
    }
    
    // Free result set
    mysqli_free_result($result);   
    
    //Close connection
    mysqli_close($conn);
    
    return $movieTimes;
}

function createAccount(){
    //$email, $password, $fname, $lname, $street_num, $street, $zip
    
    $email = 'fneoh@oakland.edu';
    $password = '1234';
    $fname = 'Farron';
    $lname = 'Neoh';
    $street_num = 1234;
    $street = 'sdhklsdfjsdkl';
    $zip = 12345;
    
    require 'php_helper/opendb.php';
    
    $sql = "SELECT USER_EMAIL FROM akcopema.user_account WHERE USER_EMAIL = '$email';";
    
    //Create search query
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
    //Grab Associative array
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);
        
    $DBEmails = array($row['USER_EMAIL']);
    
    if(count($DBEmails > 0)){
        return 1;
    }
   
    // Free result set
    mysqli_free_result($result);   
    
    //INSERT ACCOUNT
    $sql = "INSERT INTO `akcopema`.`user_account`
            (`USER_EMAIL`,
            `USER_PASSENCRYPT`,
            `USER_FNAME`,
            `USER_LNAME`,
            `USER_STREETNUM`,
            `USER_STREET`,
            `USER_ZIP`)
            VALUES
            ('$email',
            '$password',
            '$fname',
            '$lname',
            '$street_num',
            '$street',
            '$zip');";
    
    mysqli_query($conn,$sql) or die(mysql_error());
    
    //Close connection
    mysqli_close($conn);
    
    return 0;
}


function getTotalOrderedTickets($movieTime, $movieName){
    require 'php_helper/opendb.php';
    
    $sql = "SELECT SUM(RESERVATION_TICKETNUM) FROM
(SELECT reservation.RESERVATION_TICKETNUM, movie.MOVIE_NAME, showtime.TIME_START
FROM akcopema.reservation
JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
JOIN movie_times ON showtime.showtime_id = movie_times.showtime_id
JOIN movie on movie_times.movie_id = movie.MOVIE_ID)
AS t1 WHERE t1.TIME_START = '$movieTime'
AND t1.MOVIE_NAME = '$movieName'";
        
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    $row = mysqli_fetch_array($result,MYSQLI_BOTH); 
    // Free result set
    mysqli_free_result($result);       
    //Close connection
    mysqli_close($conn);
    return $row[0];
}

function getMovieID($movieTime, $movieInfo){
    require 'php_helper/opendb.php';
    
    $sql = "SELECT showtime.showtime_id
FROM akcopema.showtime 
JOIN movie_times ON showtime.showtime_id = movie_times.showtime_id
JOIN movie on movie_times.movie_id = movie.MOVIE_ID
WHERE TIME_START = '$movieTime[0]'
AND movie.MOVIE_NAME = '$movieInfo[0]'";
    
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    $row = mysqli_fetch_array($result,MYSQLI_BOTH); 
    $showtime_id=$row['SHOWTIME_ID'];  
    
        mysqli_free_result($result);       
    //Close connection
    mysqli_close($conn);
    return $showtime_id;
}

function createUser($email, $password, $fname, $lname, $street_num, $street, $zip){
    require 'php_helper/opendb.php';
    
    $sql = "SELECT USER_EMAIL FROM akcopema.user_account WHERE USER_EMAIL = '$email';";
    
    //Create search query
    $result = mysqli_query($conn,$sql) or die(mysql_error());

    //Grab Associative array
    $row = mysqli_fetch_array($result,MYSQLI_BOTH);

    $DBEmails = array($row['USER_EMAIL']);
    var_dump($DBEmails);
    if(count($DBEmails < 1)){


        //INSERT ACCOUNT
        $sql1 = "INSERT INTO `akcopema`.`user_account`
                (`USER_EMAIL`,
                `USER_PASSENCRYPT`,
                `USER_FNAME`,
                `USER_LNAME`,
                `USER_STREETNUM`,
                `USER_STREET`,
                `USER_ZIP`)
                VALUES
                ('$email',
                '$password',
                '$fname',
                '$lname',
                '$street_num',
                '$street',
                '$zip');";

        if (mysqli_query($conn, $sql1)) {
            header("location: login.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    // Free result set
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
}

/*
 *-------------------------------------------------------------------------------------
 *The Following is used for edit reservation page
 *-------------------------------------------------------------------------------------
*/
function getMovieNameArray($useremail){
    require 'php_helper/opendb.php';
    $movieName = array();

    $sql = "SELECT movie.MOVIE_NAME
        FROM akcopema.reservation
         JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
         JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
        JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
        WHERE reservation.USER_EMAIL = '$useremail'";
    
    //Create search query
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
    //Grab Associative array
     while($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
        array_push($movieName, $row['MOVIE_NAME']);
    }
        // Free result set
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
    
    return $movieName;
}

function getMovieTimeArray($useremail){
    require 'php_helper/opendb.php';
    $movieTime = array();

    $sql = "SELECT reservation.RESERVATION_ID, user_account.USER_EMAIL, reservation.RESERVATION_TICKETNUM, movie.MOVIE_NAME, showtime.TIME_START
        FROM akcopema.reservation
        JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
        JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
        JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
        JOIN user_account ON user_account.USER_EMAIL = reservation.user_email
        WHERE reservation.USER_EMAIL = '$useremail'";

    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
     while($row = mysqli_fetch_array($result)){
        array_push($movieTime, $row['TIME_START']);
    }
        // Free result set
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
    
    return $movieTime;
}

function getTicketQtyArray($useremail){
    require 'php_helper/opendb.php';
    $quantity = array();

    $sql = "SELECT reservation.RESERVATION_ID, user_account.USER_EMAIL, reservation.RESERVATION_TICKETNUM, movie.MOVIE_NAME, showtime.TIME_START
        FROM akcopema.reservation
        JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
        JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
        JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
        JOIN user_account ON user_account.USER_EMAIL = reservation.user_email
        WHERE reservation.USER_EMAIL = '$useremail'";

    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
     while($row = mysqli_fetch_array($result)){
        array_push($quantity, $row['RESERVATION_TICKETNUM']);
    }
        // Free result set
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
    
    return $quantity;
}

function getReservationIDArray($useremail){
    require 'php_helper/opendb.php';
    $reservationID = array();

    $sql = "SELECT reservation.RESERVATION_ID, user_account.USER_EMAIL, reservation.RESERVATION_TICKETNUM, movie.MOVIE_NAME, showtime.TIME_START
        FROM akcopema.reservation
        JOIN akcopema.showtime ON reservation.showtime_id = showtime.showtime_id
        JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
        JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
        JOIN user_account ON user_account.USER_EMAIL = reservation.user_email
        WHERE reservation.USER_EMAIL = '$useremail'";

    $result = mysqli_query($conn,$sql) or die(mysql_error());
    
     while($row = mysqli_fetch_array($result)){
        array_push($reservationID, $row['RESERVATION_ID']);
    }
        // Free result set
    mysqli_free_result($result);

    //Close connection
    mysqli_close($conn);
    
    return $reservationID;
}
 
