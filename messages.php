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
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <meta name="description" content="">
     <meta name="author" content="">
     <link rel="icon" href="../../favicon.ico">
     <title>PSN</title>
      <script src = "../a8/jquery-1.12.3.min.js"></script>
     <script>

       function submitChat(){
        var uname = encodeURIComponent(document.getElementById('uname').value);
         var msg = encodeURIComponent(document.getElementById('msg').value);
         var chatname = encodeURIComponent(document.getElementById('chatname').value);
         //var state = 1;
         var data = "msg="+msg+"&chatname="+chatname+"&uname="+uname;
         //alert(uname);
           if(msg == ''||chatname == ''){
               alert("All fields are mandatory!");
               //return;
           }
           //ar uname = document.getElementById('uname').value;
           //var msg = document.getElementById('msg').value;
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onload = function(){
               if(xmlhttp.status == 200){
                 //console.dir(xmlhttp.responseText);
                 ///console.dir(document.getElementById('chatlogs'));
                // alert(1);
                   document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
               }
           }
           /*var urList = new Array('insert.php','logs.php');
           for(var x = 0; x < urList.length; x++){
             xmlhttp.open('POST',urList[x],true);
             xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xmlhttp.send(data);
           }*/
           xmlhttp.open('POST','insert.php',true);
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xmlhttp.send(data);
           setInterval(function(){
             var chatname2 = encodeURIComponent(document.getElementById('chatname').value);
             var uname2= encodeURIComponent(document.getElementById('uname').value);
             $('#chatlogs').load("logs.php",{chatname:chatname2,uname:uname2}).fadeIn("slow");
           },1000);
       }
       function searchuser(){
         var uname = encodeURIComponent(document.getElementById('uname').value);

         //var msg = encodeURIComponent(document.getElementById('msg').value);
         var data = "uname="+uname;

         //alert(uname);
           if(uname == ''){
               alert("All fields are mandatory!");
               //return;
           }
           //ar uname = document.getElementById('uname').value;
           //var msg = document.getElementById('msg').value;
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onload = function(){
               if(xmlhttp.status == 200){
                 //console.dir(xmlhttp.responseText);
                // console.dir(document.getElementById('chatlogs'));
                // alert(1);
                   document.getElementById('user2').innerHTML = xmlhttp.responseText;
               }
           }
           xmlhttp.open('POST','searchuser.php',true);
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xmlhttp.send(data);
       }
       function searchuser2(){
         var chatname = encodeURIComponent(document.getElementById('chatname').value);
         //var msg = encodeURIComponent(document.getElementById('msg').value);

         var data = "chatname="+chatname;
         //alert(uname);
        //console.log(chatname);
           if(chatname == ''){
               alert("All fields are mandatory!");
               //return;
           }
           //ar uname = document.getElementById('uname').value;
           //var msg = document.getElementById('msg').value;
           var xmlhttp = new XMLHttpRequest();
           xmlhttp.onload = function(){
               if(xmlhttp.status == 200){
                 //console.dir(xmlhttp.responseText);
                // console.dir(document.getElementById('chatlogs'));
                // alert(1);
                   document.getElementById('user1').innerHTML = xmlhttp.responseText;
               }
           }
           xmlhttp.open('POST','enter.php',true);
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xmlhttp.send(data);
       }
       function clearContents(){
        document.getElementById('msg').value = '';
       }

       /*$(document).readt(function(e)){
         $.ajaxSetup({cache:false});
         setInterval(fucntion(){$(#chatlogs).load('logs.php');},2000);
       }*/
     </script>
     <style>
     div.chatlogs{
       border: 1px solid black;
       height: 500px;
       margin-bottom: 10px;
       overflow: scroll;
     }
     ::-webkit-scrollbar {
       width: 12px;
       height: 12px;
     }
     ::-webkit-scrollbar-thumb {
       background: yellow-green;
       border-radius: 10px;
     }
     ::-webkit-scrollbar-thumb:hover {
       background: #88ba1c;
     }
     #msg{
       margin-left: 162px;
       width:700px;
     }
     #useimg1{
       width: 50px;
       height: 50px;
     }
     #useimg2{
       width: 50px;
       height: 50px;
     }

     #enter{
       float: left;
       margin-left: 40px;
     }
     </style>
     <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
   </head>
   <body>

   <?php include 'navbar.php' ?>

        <div class='jumbotron'>
          <div class="row">
            <div class="col-md-3">
              <img src="http://dl.hiapphere.com/data/icon/201409/HiAppHere_com_kov.theme.lumos.png" alt="User Image" id = "useimg1">
              <h3>Sender:</h3>
              <h4 id = "user1"> firstName lastName </h4>
              Enter Your chat name:
              <input class="text-input" type = "text" name ="chatname" id = "chatname"><br>
              <button class="btn btn-md btn-primary styles" onclick="searchuser2();"> Ok </button>
            </div>
            <div class="col-md-6">
              <div id ="chatlogs" class = "chatlogs">Loading chatlogs please wait...</div>
            </div>
            <div class="col-md-3">
              <img src="http://dl.hiapphere.com/data/icon/201409/HiAppHere_com_kov.theme.lumos.png" alt="User Image" id = "useimg2">
              <h3>Recipient:</h3>
              <h4 id = "user2"> firstName lastName </h4>
              Search Recipent's name: 
              <input class="text-input" type = "text" name = "uname" id = "uname"> <br>
              <button class="btn btn-md btn-primary styles" onclick="searchuser();"> Ok </button>
            </div>
          </div>

          <label for="message">Message: <span class="required">*</span></label>
          <textarea class="text-input" id="msg" name="msg" placeholder="Type your message here.." required="required" data-minlength="20"></textarea>
          <button class="btn btn-md btn-primary styles" onclick="submitChat(); clearContents();">Send</button><br>
        </div>
        <!--div id="chatlogs"> Loading chatlogs please wait...</div-->


     <!-- Bootstrap core JavaScript
     ================================================== -->
     <!-- Placed at the end of the document so the pages load faster -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
     <script src="../../dist/js/bootstrap.min.js"></script>
     <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
   </body>
 </html>
