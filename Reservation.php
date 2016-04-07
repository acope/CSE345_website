<?php
session_start();
include "php_helper/function.php";
$movieInfo = getMovieInformation($_GET['name']);
$orderedTickets = getTotalOrderedTickets($_GET['id'],$_GET['name']);
$ticketsRemaining = 20 - $orderedTickets;
//Retrieve varaibles from url
$movieTime = $_GET['id']; 
$movieName = $_GET['name'];
$email = $_SESSION['user_email'];
$_SESSION['movieTime'] = $_GET['id'];
$_SESSION['movieName'] = $_GET['name'];
  
if(isset($_POST['selectTickets'])){
    require 'php_helper/opendb.php';
    $sql = "SELECT showtime.showtime_id
FROM akcopema.showtime 
JOIN MOVIE_TIMES ON showtime.showtime_id = movie_times.showtime_id
JOIN MOVIE on movie_times.movie_id = movie.MOVIE_ID
WHERE TIME_START = '$movieTime[0]'
AND movie.MOVIE_NAME = '$movieInfo[0]'";
    
    $result = mysqli_query($conn,$sql) or die(mysql_error());
    $row = mysqli_fetch_array($result,MYSQLI_BOTH); 
    
    $showtime_id=$row[0];  
    $dateFmt = date('o').'-'.date('m').'-'.date('d');
    $ticket_number = $_POST['selectTickets'];
    
    $sql2 = "INSERT INTO `akcopema`.`reservation`
(`USER_EMAIL`,
`SHOWTIME_ID`,
`RESERVATION_TICKETNUM`,
`RESERVATION_CREATION`,
`RESERVATION_DATE`)
VALUES
('$email',
'$showtime_id',
'$ticket_number',
'$dateFmt',
'$dateFmt');";
    
    if(!mysqli_query($conn,$sql2)){
        echo "Houston... We have a problem... :/";
    }
    else{
        header('location:editReservation.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Reservation_Page">
    <meta name="author" content="Brandon Paulus">

    <title>AFB Theaters: Reservation Page</title>

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
                        <h1> AFB Theaters: Reservation Page</h1>
                    </div>
                    <div class="col-lg-6 text-right">
                       <?php include 'php_helper/login_button.php' ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
     <!--Main Section-->
    <!--Main section will include movie photo, order details, the name of the moivie, and the time and date. It will also, include the ticket order and quantity.-->
    <!--The boarders are for looks only right now, we can change them or get rid of them-->
    
        <div class="container">
            <div class="row">
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
                    </div>
                </div>
            </div>
        </div>
       
    <form>
        <div class="container">
          <div class="form-group">
              <div class="row">
                <div class="col-lg-2">
                  <div class="form-group">

                    <label for="sel1">Researve tickets:</label>
                    <select class="form-control" name="selectTickets">
                        <?php
                            for($i=1; $i <= $ticketsRemaining; $i++){
                                echo "<option value='$i''>$i</option>";
                            }
                        ?>
                        <input type="submit" formmethod="post" value="Submit">
                    </select>
                 </div> 
                </div>
              </div>   
            </div>
       </div>    
    </form>
<?php print_r($_POST);?>
    <!--
    <div class="container">
        <form>
            <div class="form-group">
                <div class="row">
                    <div class="row-lg-8">
                         <button type="submit" name="submit" formmethod="post" class="btn btn-default">Reserve tickets</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
  -->  
    
     <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>