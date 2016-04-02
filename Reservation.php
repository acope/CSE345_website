<?php
session_start();
include "php_helper/function.php";
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
    
    <section id="main">
        <div class="container">
            <div class="row ">
                <div class="col-lg-8">
                    <!--This could be populated using for loops in PHP to keep times and movie next to each other or maybe use a drop down menu -->
                    <div class="equalHeight">
                        
                         
                        <div class="col-lg-4">
                            <img width="182" height="268" src="<?php echo getMovieThumbnail($_GET['name']) ?>" >
                             
                        </div>
                        
                        <div class="col-lg-8">
                            <iframe width="560" height="268"  src="https://www.youtube.com/embed/EXeTwQWrcwY" frameborder="0" allowfullscreen></iframe>
                           
                        </div>
                        </div>
                    </div>
                </div>
                
            </div>  
        
    </section>
<?php print_r($_GET) ?>
    <section id= "Ticket_count">
   <form>
        <div class="container">
  <div class="form-group">
      <div class="row">
<div class="col-lg-2">
          <div class="form-group">
            <label for="sel1">How many tickets:</label>
            <select class="form-control" id="sel1">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        </div> 
          </div>
    
            </div>   
      </div>
       </div>
       
</form>
         </section>
    
    
    <section id= "submit_button">
         <div class="container">
      <form>
  <div class="form-group">
      <div class="row">
        <div class="row-lg-8">
<button type="submit" class="btn btn-default">Reserve tickets</button>
          </div>
          
      </div>
          </div>
          </div>

       </section>
    </form>

    
   
     <script>
        $('.equalHeight').each(function() {
        var eHeight = $(this).innerHeight();
        $(this).find('div').outerHeight(eHeight);
        });
    </script>