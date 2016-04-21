<?php
include("config.php");
session_start();
$user_email = $_POST['user_email'];
$user_passward =$_POST['$user_passward'];
$user_id =$_POST['$user_id'];
//$con = mysql_connect("localhost","root","!HZwwh258369");

mysql_query("INSERT INTO UserCredentials (UserCredential_Email,UserCredential_Passward,UserCredential_Id) 
VALUES($user_email,$user_passward,$user_id)");
//mysql_close($con);
?>
