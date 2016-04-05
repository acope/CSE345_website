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
*/
function getMovieInformation($movieName){
    require 'php_helper/opendb.php';
    
    //Grab all of the movies
    $sql = "SELECT * FROM MOVIE WHERE MOVIE_NAME='$movieName'";
    
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

function createAccount($email, $password, $fname, $lname, $street_num, $street, $zip){
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