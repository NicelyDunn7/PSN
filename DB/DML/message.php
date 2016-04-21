<?php
include("config.php");
session_start();
$sender = $_POST['post_Id'];
$recipent = $_POST['post_Userid'];
$message_id = $_POST['post_content'];
$message_datatime = $_POST['post_datatime'];
$subjct = $_POST['post_comments'];
$content = $_POST['likes'];

$result = mysql_query("INSERT INTO Messages (Sender, Recipient, Message_Id, Message_DataTime, Subject, Content) 
VALUES($sender, $recipent, $message_id, $message_datatime, $subjct, $content)");

//mysql_close($con);
?>
