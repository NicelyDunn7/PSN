<?php
include("config.php");
session_start();
$business_email = $_POST['business_email'];
$business_passward = $_POST['business_passward'];
$business_id = $_POST['$business_id'];


mysql_query("INSERT INTO BusinessCredentials (BusinessCredential_Email, BusinessCredential_Passward, BusinessCredential_Id) 
VALUES($business_email,$business_passward,$business_id)");
//mysql_close($con);
?>
