<?php 
    //session_start();
    require 'php_helper/opendb.php';
    require 'php_helper/function.php';

    if (isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $street_num = $_POST['street_num'];
        $street = $_POST['street'];
        $zip = $_POST['zip'];
        
        createUser($email, $password, $fname, $lname, $street_num, $street, $zip);
    }//end if
?>

<!-- TODO make sure user is not already logged in -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="AFB Theaters account creation page, used to create the users account imformation">
    <meta name="author" content="Austin Copeman">

    <title>Account Creation</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/grayscale.css" rel="stylesheet"> -->
    <link href="css/movie.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                    <div class="col-lg-6 text-left">
                        <h1> AFB Theaters</h1>
                    </div>
                    <div class="col-lg-6 text-right">
                        <!--<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
 <div class="form-wrapper">  
    <form action="#" method="post">
        <h3> Register here</h3>
        
        <div class="form-item">Email:
            <input type="text" name="email" required="required" placeholder="jdoe@CSE345.com" autofocus required></input>
        </div>
     
        <div class="form-item">Password:
            <input type="text" name="password" required="required" placeholder="Password"></input>  
        </div>
    
        <div class="form-item">First Name:
            <input type="text" name="fname" required="required" placeholder="John"></input>
        </div>

        <div class="form-item">Last Name:
            <input type="text" name="lname" required="required" placeholder="Doe"></input>
        </div>

        <div class="form-item">Street Number:
            <input type="number" name="street_num" required="required" placeholder=""></input>
        </div>

        <div class="form-item">Street:
            <input type="text" name="street" required="required" placeholder=""></input>
        </div>

        <div class="form-item">Zip Code:
            <input type="number" name="zip" required="required" placeholder=""></input>
        </div>

        <div class="button-panel">
            <input name="submit" type="submit" value="Submit")</input>
        </div>

    </form>
 </div>   
    
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/grayscale.js"></script>
     
    
    <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>


</html>