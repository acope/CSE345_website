<?php

session_start();
session_destroy();

<!-- FIXME Chang the location of the logout-->
    
header('location:index.php');
?>