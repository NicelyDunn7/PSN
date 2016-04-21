<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	}
	
	session_start();
	$_SESSION['invalid-email']=0;
		//if session var is set to 1 then email's were invalid

	$_SESSION['invalid-pw']=0;
		//if session var is set to 1 then pw's are invalid
				
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

		<?php
			global $fname, $lname, $occupation, $location, $email, $phone, $post, $searchString, $search;
		
			//Connect to the MySQL Account on Azure Server
			include 'controllers/dbcreds.php';
			
			//$searchString = $_POST['searchS'];
			echo $search;
						
			$search = $_SESSION['searchString'];
				
					//get users info
					$sql = "SELECT * FROM User WHERE User_Id = '{$_SESSION['searchString']}'";
					$sql2 = "SELECT * FROM UserCredentials WHERE UserCredential_Id = '{$_SESSION['searchString']}'";
					
					$result =  $link->query($sql);
					$result2 = $link->query($sql2);
					
					
					
					//get info from user table
					if($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$fname = $row['Fname'];
						$lname = $row['Lname'];
						$age = $row['Age'];
						$occupation = $row['Employed'];
						$location = $row['Location'];
						$education = $row['Degree'];

					}
					//get info from user credential table
					if($result2->num_rows > 0) {
						$row2 = $result2->fetch_assoc();		
						$email = $row2['UserCredential_Email'];
						
					}
					
					
					
					/********* OUTPUT BUSINESS'S INFO ON THEIR PROFILE PAGE ****************/
				
				/*$busSql = "SELECT * FROM Businesses WHERE Bus_Id = '{$_SESSION['bus_id']}'";
				$busSql2 = "SELECT * FROM BusinessCredentials WHERE BusinessCredential_Id = '{$_SESSION['bus_id']}'";
				
				$busResult =  $link->query($busSql);
				$busResult2 = $link->query($busSql2);
				
				//get info from business table
				if($busResult->num_rows > 0) {
					$row = $busResult->fetch_assoc();
					$fname = $row['Bus_Name'];
					$lname = $row['Industry'];
					$age = $row['Website'];
					//$occupation = $row['Website'];
					$location = $row['Location'];
					$phone = $row['Tele'];				

				}
				//get info from business credential table
				if($busResult2->num_rows > 0) {
					$row2 = $busResult2->fetch_assoc();		
					$email = $row2['BusinessCredential_Email'];
					
				}
			} */
				
			
			$link->close();
		?>

			<div class="jumbotron">
			  <div class="container">
				<div align="center">
				<p>
				  <div style="float:left">
					<div class="profile-photo">  <?php //the css this div is styled with pulls the image file ?> </div>
				  </div>
					<table>
					  <tr>
						<td class="field">
						  <font class="profile"><?php echo $fname; ?></font>
						</td>
						<td class="field">
						  <font class="profile"><?php echo $lname; ?></font>
						</td>
					  </tr>
					  <tr>
						<td class="field">
						  <font class="profile"><?php echo $age; ?></font>
						</td>
					  </tr>
					   <tr>
						<td class="field">
						  <font class="profile"><?php echo $occupation; ?></font>
						</td>
					  </tr>
					  <tr>
						<td class="field">
						  <font class="profile"><?php echo $location; ?></font>
						</td>
					  </tr>
					  <tr>
						<td class="field">
						  <font class="profile"><?php echo $education; ?></font>
						</td>
					  </tr>
					  <tr>
					  <td class="field">
						<font class="profile"><?php echo $email; ?></font>
					  </td>
					  </tr>
					  <tr>
					  <td class="field">
						<font class="profile"><?php echo $phone; ?></font>
					  </td>
					  </tr>
					</table>
				</p>
				</div>
			  </div>
			</div>

			<div class="jumbotron">
			  <div class="container">
				<div align="center">
				<p>
				  <table>
				  <tr><td>
				  <div style="float:left">
					<div class="post-photo">  <?php //the css this div is styled with pulls the image file ?> </div>
				  </td></tr>
				  <tr><td>
					<table>
					  <tr>
						<td> <?php echo $fname." ".$lname ?>
					  </tr>
					</table>
				  </div>  
				  </td></tr>
				  </table>
				  <div style="float:right">
					<table class="post">
					  <tr>
						<td>
						  <textview class="post">
							<?php echo $post; ?>
						  </textview>
						</td>
					  </tr>
					</table>
				  </div>
				</p>
				</div>
			  </div>
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