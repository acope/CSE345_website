<?php
session_start();
include('opendb.php');
$email=$_POST['email'];
$password=$_POST['password'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$streetnum=$_POST['streetnum'];
$street=$_POST['street'];
$zip=$_POST['zip'];


mysql_query("INSERT INTO user_account(USER_EMAIL, USER_PASSENCRYPT, USER_FNAME, USER_LNAME, USER_STREETNUM, USER_STREET, USER_ZIP)VALUES('$email', '$password', '$fname', '$lname', '$streetnum', '$street', '$zip')");
header("location: index.php?remarks=success");
mysql_close($conn);
?>