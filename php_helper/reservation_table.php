<?php
    // This will be the file for populating index movie table 
//    require_once 'php_helper/opendb.php';
//    require('php_helper/function.php');
?>

<table class='table table-bordered movie-table'>
    <thead>
        <tr>
            <th>Movie</th><th>Time</th><th>Quantity</th>
        </tr>
    </thread>

    <tbody>
    
   
    <?php
        //If the user is logged in take them to the reservation page
        for($i=0; $i<count($movieName); $i++){
            echo "<tr>";
            echo "<td>$movieName[$i]</td>";
            echo "<td>$movieTime[$i]</td>";
            echo '<td><div class="form-item"><input type="number" name="quantity'.$i.'" required="required" value="'.$quantity[$i].'"></input> </div></td>';
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