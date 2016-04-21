<?php
include("config.php");
session_start();
$user_id = $_POST['user_id'];
$location = $_POST['location'];
$employment_his = $_POST['employment_his'];
$gender = $_POST['gender'];
$education = $_POST['education'];
$user_email = $_POST['user_email'];
$skills = $_POST['skills'];
$volunter_work = $_POST['volunter_work'];


mysql_query("UPDATE User SET Location = $location, Employment_History = $employment_his, Education = $education, User_Email = $user_email, Skills = $skills WHERE User_Id = $user_id");
//mysql_close($con);
?>
