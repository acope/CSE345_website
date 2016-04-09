<?php
    // This will be the file for populating index movie table 
    require_once 'php_helper/opendb.php';
    require 'php_helper/function.php';

    $darkKnightTimes = array();
    $everestTimes = array();
    $interstellarTimes = array();
    $bourneIdentityTimes = array();
    $planetOfTheApesTimes = array();

    $darkKnightTimes = getMovieTimes($darkKnight); 
    $everestTimes = getMovieTimes($everest); 
    $interstellarTimes = getMovieTimes($interstellar); 
    $bourneIdentityTimes = getMovieTimes($bourneIdentity); 
    $planetOfTheApesTimes = getMovieTimes($planetOfTheApes); 

?>

<table class='table table-bordered movie-table'>
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

    </tbody>
    </table>