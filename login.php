<?php session_start(); ?>
<?php require_once('php_helper/opendb.php');?>
<!DOCTYPE html>
<html lang="en">

    
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="My personal website">
    <meta name="author" content="Austin Copeman">

    <title>AFB Theaters</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/grayscale.css" rel="stylesheet"> -->
    <link href="css/movie.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!--OWL Carousel-->
    <link rel="stylesheet" href="owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="owl-carousel/owl.theme.css">
    <link rel="stylesheet" href="owl-carousel/owl.transitions.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>




    <!--Banner Section-->
    <!-- This section will be where the theater name and login will be (on most screens)-->
    <section id="movieBanner" class="banner">
        <div class="banner-body">
            <div class="container">
                <div class="row equalHeight">
                    <div class="col-lg-8 text-left">
                        <h1> AFB Theaters</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!--Main Section-->
    <!--Main section will include movies and thier times as well as misc things that we can come up with-->
    <!--The boarders are for looks only right now, we can change them or get rid of them-->
    <!-- TODO create PHP for login, search for user and login or display user not found-->
<div class="form-wrapper">

    <form action="#" method="post">
        <h3>Login here</h3>

        <div class="form-item">
            <input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
        </div>

        <div class="form-item">
            <input type="password" name="pass" required="required" placeholder="Password" required></input>
        </div>

        <div class="button-panel">
            <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
        </div>
    </form>
    
    <?php
        if (isset($_POST['login']))
            {
                $username = mysqli_real_escape_string($conn, $_POST['user']);
                $password = mysqli_real_escape_string($conn, $_POST['pass']);

                $query 		= mysqli_query($conn, "SELECT * FROM USER_ACCOUNT WHERE  USER_PASSENCRYPT='$password' and USER_EMAIL='$username'");
                $row		= mysqli_fetch_array($query);
                $num_row 	= mysqli_num_rows($query);

                if ($num_row > 0) 
                    {			
                        $_SESSION['USER_ACCOUNT_ID']=$row['USER_ACCOUNT_ID'];
                        header('location:index.php');

                    }
                else
                    {
                        echo 'Invalid Username and Password Combination';
                    }
            }
    ?>
        <div class="reminder">
            <p>Not a member? <a href="#">Sign up now</a></p>
            <p><a href="#">Forgot password?</a></p>
        </div>

</div>

    
    
    
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>


    <!--OWL Carousel Plugin Files-->
    <!--  jQuery 1.7+  -->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="assets/js/jquery-1.9.1.min.js"></script>
     
    
    
    <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>


</html>