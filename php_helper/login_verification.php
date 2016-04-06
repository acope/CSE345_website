<?php
    $_SESSION['validate_credentials']=0;

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
            $_SESSION['user_email']=$row['USER_EMAIL'];
            // loggedin will be used to see if the user has logged in
            $_SESSION['loggedin'] = 1;
            $_SESSION['validate_credentials']=0; //user has inputted correct credentials
            header('location:index.php');

        }
        else 
        {
            $_SESSION['validate_credentials']=1; //user has inputted wrong credentials
            echo 'Invalid Username and/or Password';
        }
    }//end if