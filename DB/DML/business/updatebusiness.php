<?php
include("config.php");
session_start();
$bus_id = $_POST['bus_id'];
$location = $_POST['location'];
$industry = $_POST['industry'];
$bus_name = $_POST['bus_name'];;
$bus_email =$_POST['bus_email'];


mysql_query("UPDATE Businesses SET Location = $location, Bus_Name = $bus_name, Bus_Email = $bus_email WHERE Bus_Id = $bus_id");
//mysql_close($con);
?>
