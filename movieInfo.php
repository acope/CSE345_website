<?php
session_start();
include "php_helper/function.php";

//Used to retireve the information for the movie
$movieInfo = getMovieInformation($_GET['name']);
$movieTimes = getMovieTimes($_GET['name']); 
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
    
        <div class="container ">
            <div class="row">
                <div class="col-lg-8">
                    <div > 
                        <div class="row" style="padding: 10px">
                            <div class="col-lg-4">
                                <img width="229" height="315" src="<?php echo getMovieThumbnail($_GET['name']) ?>">                        
                            </div>           
                            <div class="col-lg-8">
                                <?php echo $movieInfo[8] ?>
                            </div>
                        </div>
                        
                        <div class="row equalHeight" >
                            <div class = "col-lg-8 movie-table"> 
                                <h3><b>Now Playing</b></h3>
                                <dl class="dl-horizontal">
                                    <dt>Synopsis</dt>
                                    <dd> <?php echo $movieInfo[5] ?></dd>

                                    <dt>Running Time</dt>
                                    <dd> <?php echo $movieInfo[7] ?> minutes</dd>
                                    
                                    <dt>Director</dt>
                                    <dd> <?php echo $movieInfo[2] ?> minutes</dd>
                                    
                                    <dt>Lead Actor</dt>
                                    <dd> <?php echo $movieInfo[3] ?> minutes</dd>
                                    
                                    <dt>Rating</dt>
                                    <dd> <?php echo $movieInfo[4] ?> minutes</dd>
                                </dl>
                                
                            </div>
                            <div class="col-lg-4 movie-table"> 
                                <h3><b>Movie Times</b></h3>
                                <?php 
                                    for($i=0; $i<count($movieTimes); $i++){
                                        echo "<a  href='Reservation.php?name=$movieInfo[1]&id=$movieTimes[$i]' target='_self' > $movieTimes[$i] </a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>       
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