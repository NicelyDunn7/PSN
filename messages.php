<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        session_start();


        if(strcmp($_SESSION['type'],'user') === 0){
    
        } else if(strcmp($_SESSION['type'], 'business') === 0){
         
        }else{
          header('Location: https://mizseng.centralus.cloudapp.azure.com/index.php');
        } 


?>

<!-- Latest compiled and minified CSS -->
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

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
	<link href="messageTemp.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

	

<?php include 'navbar.php' ?>


		<!-- MESSAGING TEMPLATE -->
<div class="jumbotron">
      <div class="container">
      <div class="jumbotron-content">
				<div>
				<table>
					<tr>
						<td>
							<img src="pic_mountain.jpg" alt="User Image" style="width:100;height:100;">
							<h4> firstName lastName </h4>
						</td>
						<td>
							<textarea placeholder="Message Content"></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<textarea id="message" name="message" placeholder="Message Content"></textarea>
						</td>
						<td>
							<img src="pic_mountain.jpg" alt="User Image" style="width:100;height:100;">
							<h4> firstName lastName <h4>
						</td>						
				</table>				
				</div>
			<form>
				<div id="message-form">
					<label for="message">Message: <span class="required">*</span></label>
					<textarea id="message" name="message" placeholder="Type your message here.." required="required" data-minlength="20"></textarea>
				 
					<br><br>
					<span id="loading"></span>
					<input type="submit" value="Send!" id="submit-button" />
				</div>
			</form>	
      </div>
		</div>
</div>
		
		<!--
		<form>
			<table border = "1">
			<tr>
					<td>
						<img src="pic_mountain.jpg" alt="User Image" style="width:160;height:150;">
						<h4> firstName lastName <h4>
					</td>
					<td width="100%"> 
						<input type="text"; width= "100%">
						Message Content 
					</td>
			</tr>
				<br><br>
				<tr>
					<td width="100%"> 
						<input type="text"; width= "100%">
						Message Content 
					</td>
					<td>
						<img src="pic_mountain.jpg" alt="User Image" style="width:160;height:150;">
						<h4> firstName lastName <h4>
					</td>
				</tr>
				
			</table>
			
			<br><br>
				<div align="right">
				<input type="submit" value="SEND" style="width:100px; height:100px>
				</div>
		</form> -->
		

   
    </div>




        </div> <!-- /container -->


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