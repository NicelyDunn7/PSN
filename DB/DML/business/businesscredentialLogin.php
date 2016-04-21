<?php
include("config.php");
session_start();
$business_email = $_POST['business_email'];
$business_passward =$_POST['business_passward'];
$business_id =$_POST['business_id'];

$result = mysql_query("SELECT BusinessCredential_Id, BusinessCredential_Email, BusinessCredential_Passward FROM BusinessCredentials WHERE BusinessCredential_Id = $business_id");
if($result){
    echo "Welcome to ......";
} 
else{
    echo "Please register first!";
}
//mysql_close($con);
?>
