<?php session_start(); ?>
<?php require_once 'php_helper/opendb.php';?>
<?php require_once 'php_helper/login_verification.php';?>
<!DOCTYPE html>
<html lang="en">

    
    
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Login Page">
    <meta name="author" content="Austin Copeman">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/grayscale.css" rel="stylesheet"> -->
    <link href="css/movie.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


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
            <input type="text" name="email" required="required" placeholder="Email" autofocus required></input>
        </div>

        <div class="form-item">
            <input type="password" name="pass" required="required" placeholder="Password" required></input>
        </div>

        <div class="button-panel">
            <input type="submit" class="button" title="Log In" name="login" value="Login"></input>
        </div>
    </form>

        <div class="reminder">
            <p>Not a member? <a href="accountCreation.php">Sign up now</a></p>
        </div>

</div>

    
    
    
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script> 

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

     
    
    
    <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>


</html>