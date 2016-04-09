<?php 
    session_start();
    require('php_helper/opendb.php');
    require('php_helper/function.php');
    

    $useremail = $_SESSION['user_email'];

    $movieName = getMovieNameArray($useremail);
    $movieTime = getMovieTimeArray($useremail);
    $quantity = getTicketQtyArray($useremail);
    $reservationID = getReservationIDArray($useremail);
    $error_array = array();



    if (isset($_POST['submit'])){        
        
        for($i=0; $i<count($movieName); $i++){            
            $quant = (int)$_POST['quantity'.$i];
            $ticketsLeft = (20 - getTotalOrderedTickets($movieTime[$i],$movieName[$i])) + $quantity[$i];
            
            if($quant <= $ticketsLeft){
                if($quant===0){
                    $sql = "DELETE FROM `akcopema`.`reservation`
                        WHERE RESERVATION_ID='$reservationID[$i]';";
                }
                else{
                    $sql = "UPDATE `akcopema`.`reservation`
                        SET `RESERVATION_TICKETNUM` = '$quant'
                        WHERE `RESERVATION_ID` = '$reservationID[$i]'";
                }
                
                $movieName = getMovieNameArray($useremail);
                $movieTime = getMovieTimeArray($useremail);
                $quantity = getTicketQtyArray($useremail);
                $reservationID = getReservationIDArray($useremail);
                header( "editReservation.php" );
            }
            else{
                $error_string = "Update on $movieName[$i] at $movieTime[$i] has failed. Number of tickets requested is greater than amount available ($ticketsLeft).<br/>\n";
                array_push($error_array, $error_string);
            }

            $sql = NULL;
            header( "editReservation.php" );                    
        }
        
        
        
        for($j=0; $j<count($error_array); $j++){
            echo $error_array[$j];
        }
        
        if(count($error_array) > 0){
            header( "refresh:5;editReservation.php" );
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="AFB Confirmation page">
    <meta name="author" content="Austin Copeman">

    <title>AFB Theaters</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/grayscale.css" rel="stylesheet"> -->
    <link href="css/movie.css" rel="stylesheet">

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
                            <?php 
                                include 'php_helper/login_button.php'; 
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<div class="container">
        <div class="form-wrapper">  
            <form action="#" method="post"> 
                <div class="col-lg-12">
                    <table class='table table-bordered movie-table'>
                        <thead>
                            <tr>
                                <th>Movie</th><th>Time</th><th>Quantity</th>
                            </tr>
                        </thread>

                        <tbody>
                        <?php
                            //If the user is logged in take them to the reservation page
                            for($i=0; $i<count($movieName); $i++){
                                echo "<tr>";
                                echo "<td>$movieName[$i]</td>";
                                echo "<td>$movieTime[$i]</td>";
                                echo '<td><div class="form-item"><input type="number" name="quantity'.$i.'" required="required" value="'.$quantity[$i].'"></input> </div></td>';
                                echo "</tr>";
                            }
                        ?>  
                       </tbody>
                    </table>
                </div>

            <div class="col-lg-12 col-lg-offset-5">
                <div class="button-panel">
                    <input name="submit" type="submit" value="Save Changes" formmethod="post">
                </div>
            </div>
        </form>
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