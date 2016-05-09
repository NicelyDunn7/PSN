<?php
//If the user is not connected through HTTPS, redirect into it
if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
   header('Location: ' . $url);
}

session_start();

if(strcmp($_SESSION['type'],'user') === 0){

} else if(strcmp($_SESSION['type'], 'business') === 0){
 
}else{
  header('Location: index.php');
}

$uname = $_POST['uname'];
echo $uname;

session_start();

include 'controllers/dbcreds.php';

$sql = "SELECT * FROM User WHERE User_Id = '$uname'";
$result =  $link->query($sql);

//echo $result;
if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    echo "/".$row['Fname'].",".$row['Lname']."<br>";
  }
}
?>
