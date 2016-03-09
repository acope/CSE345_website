<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_id']) || (trim($_SESSION['user_id']) == '')) {
    <!-- TODO change where it goes back to --> 
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['user_id'];

?>