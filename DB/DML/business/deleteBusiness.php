<?php
include("config.php");
session_start();
$business_email = $_POST['business_email'];
$business_passward =$_POST['business_passward'];
$business_id =$_POST['business_id'];


mysql_query("DELETE FROM BusinessCredentials WHERE BusinessCredential_Id = $business_id");
?>
