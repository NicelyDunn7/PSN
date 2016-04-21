<?php
include("config.php");
session_start();
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$user_id = $_POST['user_id'];
$age = $_POST['age'];
$location = $_POST['location'];
$employment_his = $_POST['employment_his'];
$gender = $_POST['gender'];
$education = $_POST['education'];
$user_email = $_POST['user_email'];
$skills = $_POST['skills'];
$volunter_work = $_POST['volunter_work'];

mysql_query("INSERT INTO User (Fname, Lname, User_Id, Age, Location, Employment_History, Gender, Education, User_Email, Skills, Volunteer_Work) 
VALUES($fname, $lname, $user_id, $age, $location, $employment_his, $gender, $education, $user_email, $skills, $volunter_work)");
//mysql_close($con);
?>
