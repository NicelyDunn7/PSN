<?php
include("config.php");
session_start();
$user_email = $_POST['user_email'];
$user_passward =$_POST['$user_passward'];
$user_id =$_POST['$user_id'];

mysql_query("DELETE FROM UserCredentials WHERE UserCredential_Id = $user_id");
?>
