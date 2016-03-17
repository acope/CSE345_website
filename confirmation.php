<?php 
    session_start();
    require_once('php_helper/opendb.php');
?>

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
                    <div class="col-lg-6 text-left">
                        <h1> AFB Theaters</h1>
                    </div>
                    <div class="col-lg-6 text-right">
                        <!--<a  href="login.php" target="_self"> <h3>LOGIN</h3> </a>-->
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
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Image Carousel Section -->
    <!-- Images will be placed here, images can include food, movies, ect.-->
    <section id="carousel">
        <div class="carousel-section">
            <div class="fluid-container">
                <div class="col-lg-12">
                    <!--Start of Carousel-->
                        <div class="wrapper-with-margin" style="padding: 10px">
                            <div id="projects-carousel" class="owl-carousel owl-theme">
                                <div class="item"><a><img class="lazyOwl" data-src="/img/movie_banner/Superman_vs_Batman-178752.jpg" alt="Superman vs Batman"></a></div>             

                                <div class="item"><a><img class="lazyOwl" data-src="/img/movie_banner/Ultimate_Captain_America_Marathon-228560.png" alt="Captain America"></a></div>             

                                <div class="item"><a><img class="lazyOwl" data-src="/img/movie_banner/Divergent_Series_Allegiant-178922.jpg" alt="Divergent"></a></div>             

                                <div class="item"><a><img class="lazyOwl" data-src="/img/movie_banner/Captain_America_Civil_War-166377.jpg" alt="Ultimate Captain America"></a></div>             
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!--Main Section-->
    <!--Main section will include movies and thier times as well as misc things that we can come up with-->
    <!--The boarders are for looks only right now, we can change them or get rid of them-->
    <section id="main">
        <div class="container">
            <div class="row equalHeight">
                <div class="col-md-12">
                    <!--This could be populated using for loops in PHP to keep times and movie next to each other or maybe use a drop down menu -->
                    <div class="equalHeight">
                        <div class="col-md-4 movie-table">
                            <p>Movie Photo</p>
                        </div>
                         <div class="col-md-8 movie-table">
                            <p>Order Details</p>
                        </div>
                    </div>
                    <div class="col-md-12 movie-table" >
                        <p>Confirmation Info</p>
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
     
    <!-- OWL js plugin -->
    <script src="owl-carousel/owl.carousel.js"></script>
    
    <!--Projects Carousel JQuery Script-->
    <script>
        $(document).ready(function() {
          $("#projects-carousel").owlCarousel({
                navigation : false,
                slideSpeed : 1600,
                paginationSpeed : 4000,
                rewindSpeed: 900,
                singleItem : true,
                stopOnHover : true,
                autoPlay: true,
                lazyLoad: true,
                transitionStyle : "fade",
                navigationText: [
                    "<i class='fa fa-chevron-left fa-fw'></i>",
                    "<i class='fa fa-chevron-right fa-fw'></i>"
                ],
                navigationText : false,
                loop: true
          });  
            
        });
    </script>
    
    <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>


</html>