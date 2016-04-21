<?php
include("config.php");
session_start();
$post_id = $_POST['post_Id'];
$post_userid = $_POST['post_Userid'];
$post_content = $_POST['post_content'];
$post_datatime = $_POST['post_datatime'];
$post_comments = $_POST['post_comments'];
$likes = $_POST['likes'];

$result = mysql_query("INSERT INTO Posts (Post_Id, Post_UserId, Post_Content, Post_DataTime, Post_Comments, Likes) 
VALUES($post_id, $post_userid, $post_content, $post_datatime, $post_comments, $likes)");

//mysql_close($con);
?>
