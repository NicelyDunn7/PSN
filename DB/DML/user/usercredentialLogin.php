<?php
include("config.php");
session_start();
$user_email = $_POST['user_email'];
$user_passward =$_POST['$user_passward'];
$user_id =$_POST['$user_id'];


$result = mysql_query("SELECT UserCredential_Id, UserCredential_Email, UserCredential_Passward FROM UserCredentials WHERE UserCredential_Id = $user_id");
if($result){
    echo "Welcome to ......";
} 
else{
    echo "Please register first!";
}
//mysql_close($con);
?>
