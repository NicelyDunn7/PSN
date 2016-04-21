<?php
include("config.php");
session_start();
$location = $_POST['location'];
$industry = $_POST['industry'];
$bus_name = $_POST['bus_name'];;
$bus_id = $_POST['bus_id'];
$bus_email =$_POST['bus_email'];


mysql_query("SELECT Location, Industry, Bus_Name, Bus_Id, Bus_Email FROM Businesses WHERE Bus_Id = $bus_id");
print "$location, $industry, $bus_name, $bus_id, $bus_email";
?>
