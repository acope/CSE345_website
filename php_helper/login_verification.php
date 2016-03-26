<?php
    if (isset($_POST['login']))
    {
        $useremail = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['pass']);

        $query = mysqli_query($conn, "SELECT * FROM USER_ACCOUNT WHERE  USER_PASSENCRYPT='$password' and USER_EMAIL='$useremail'");
        $row = mysqli_fetch_array($query);
        $num_row = mysqli_num_rows($query);

        if ($num_row > 0) 
        {			
            $_SESSION['user_name']=$row['USER_FNAME'];
            // loggedin will be used to see if the user has logged in
            $_SESSION['loggedin'] = 1;
            header('location:index.php');

        }
        else 
        {
            echo 'Invalid Username and/or Password';
        }
    }//end if