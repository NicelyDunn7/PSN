<?php
include("config.php");
session_start();
$location = $_POST['location'];
$industry = $_POST['industry'];
$bus_name = $_POST['bus_name'];;
$bus_id = $_POST['bus_id'];
$bus_email =$_POST['bus_email'];


mysql_query("INSERT INTO Businesses (Location, Industry, Bus_Name, Bus_Id, Bus_Email) 
VALUES($location, $industry, $bus_name, $bus_id, $bus_email)");
//mysql_close($con);
?>
