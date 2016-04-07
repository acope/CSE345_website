<?php
    // Test to see if the loggedin variable has been made
    // If not it creates it and sets it to 0 (Not logged in)
    if(isset($_SESSION['loggedin'])){
    // NOTE: dont know if this statement is redundant, who cares it works fix later! :)
        if($_SESSION['loggedin'] != 1){
            echo( '<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>');
        }else{
            echo("Welcome ".$_SESSION['user_name'].'<a  href="logout.php" target="_self"> <h3>LOGOUT</h3> </a>');
            
            $string = "/editReservation.phpWelcome ".$_SESSION['user_name'];
            if(isset($_SERVER['REQUEST_URI']) !== $string){
                echo('<a  href="editReservation.php" target="_self"> <h6>Edit Reservation</h6> </a>');
            }else{
                echo('<a  href="'.$_SERVER('SERVER_NAME').'" target="_self"> <h6>Back to Home</h6> </a>');
            }
        }
    }else{                            
        //$_SESSION['loggedin'] = 0;
        echo( '<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>');
    }