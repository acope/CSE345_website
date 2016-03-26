<?php
    // Test to see if the loggedin variable has been made
    // If not it creates it and sets it to 0 (Not logged in)
    if(isset($_SESSION['loggedin'])){
    // NOTE: dont know if this statement is redundant, who cares it works fix later! :)
        if($_SESSION['loggedin'] != 1){
            echo( '<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>');
        }else{
            echo("Welcome ".$_SESSION['user_name']." ".'<a  href="logout.php" target="_self"> <h3>LOGOUT</h3> </a>');
        }
    }else{                            
        $_SESSION['loggedin'] = 0;
        echo( '<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>');
    }