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

mysql_query("SELECT Fname, Lname, User_Id, Age, Location, Employment_History, Gender, Education, User_Email, Skills, Volunteer_Work FROM User WHERE User_Id = $user_id");
print "$user_id, $location, $employment_his, $gender, $education, $gender, $education, $user_email, $skills, $volunter_work";
//mysql_close($con);
?>
