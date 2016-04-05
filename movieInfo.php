<?php
session_start();
include "php_helper/function.php";

//Used to retireve the information for the movie
$movieInfo = getMovieInformation($_GET['name']);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="My personal website">
    <meta name="author" content="Austin Copeman">

    <title>Movie Information</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/grayscale.css" rel="stylesheet"> -->
    <link href="css/movie.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    
</head>




    <!--Banner Section-->
    <!-- This section will be where the theater name and login will be (on most screens)-->
    <section id="movieBanner" class="banner">
        <div class="banner-body">
            <div class="container">
                <div class="row equalHeight">
                    <div class="col-lg-6 text-left">
                        <h1>Movie Information</h1>
                    </div>
                    <div class="col-lg-6 text-right">                  
                        <?php include 'php_helper/login_button.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="main">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-8">
                    <div class="equalHeight"> 
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-4">
                                <img width="182" height="268" src="<?php echo getMovieThumbnail($_GET['name']) ?>">                        
                            </div>           
                            <div class="col-lg-8">
                                <?php echo $movieInfo[8] ?>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class = "col-lg-8 movie-table"> 
                                Movie info
                            </div>
                            <div class="col-lg-4 movie-table"> 
                                Show Times
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
        </div>  
    </section>

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