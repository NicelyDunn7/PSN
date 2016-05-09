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
		
	if(strcmp($_SESSION['type'],'user') === 0){

	} else if(strcmp($_SESSION['type'], 'business') === 0){
	 
	}else{
	  header('Location: index.php');
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

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<style>
			#tablediv {
				width: 500px;
				margin-left: auto;
				margin-right: 100px;
			}
			#tablediv table {
				color: lightgrey;
			}
			#connbutton {
				width: 275px;
				margin-bottom: 50px;
			}
			#editbutton {
				width: 275px;
				margin-bottom: 50px;
			}
			#visbutton {
				width: 275px;
			}
			th {
				width: 250px;
			}
			#text-section {
				color: lightgrey;
				text-align: center;
			}
			#text-section hr{
				color: lightgrey;
			}
			#text-section p{
				font-size: 100%;
			}
			#text-section h3:hover{
				color:white;
			}
			hr {
				border-color: black;
			}
		</style>
	  </head>
	  
  <body>

		<?php include 'navbar.php' ?>

		<?php
			global $fname, $lname, $occupation, $location, $email, $phone, $post, $searchString, $search,$outputName;
		
			//Connect to the MySQL Account on Azure Server
			include 'controllers/dbcreds.php';
			
			if( isset($_POST['type']) ){
				$type = strtolower($_POST['type']);
				$id = $_POST['id'];
				if(strcmp($_SESSION['user_id'], $_POST['id']) < 0){
					$sql = "SELECT * FROM Connections WHERE User_Id1='".$_SESSION['user_id']."' AND User_Id2='".$_POST['id']."' LIMIT 1";
				} else {
					$sql = "SELECT * FROM Connections WHERE User_Id1='".$_POST['id']."' AND User_Id2='".$_SESSION['user_id']."' LIMIT 1";
				}
				$result = $link->query($sql);
				if($result->num_rows > 0)
					$connected = true;
				else
					$connected = false;
			} else {
				$type = $_SESSION['type'];
				if($type == 'user'){
					$id = $_SESSION['user_id'];
				} else {
					$id = $_SESSION['bus_id'];
				}
			}
			
			if($type == 'user'){
				/********* OUTPUT USER'S INFO ON THEIR PROFILE PAGE ****************/
				
				$sql = "SELECT * FROM User WHERE User_Id = '".$id."'";
				$sql2 = "SELECT * FROM UserCredentials WHERE UserCredential_Id = '".$id."'";
				
				$result =  $link->query($sql);
				$result2 = $link->query($sql2);
				
				//get info from user table
				if($result->num_rows > 0) {
					//testing output each rows data
					/*while($row = $result->fetch_assoc()) {
						echo "First Name =  " . $row['Fname']. "<br> " . $row['Lname'] . "<br>" . $row['Location']. "<br>";
					}*/
					$row = $result->fetch_assoc();
					$fname = $row['Fname'];
					$lname = $row['Lname'];
					$age = $row['Age'];
					$company = $row['Company'];
					$occupation = $row['Position'];
					$location = $row['Location'];
					$education = $row['Degree'];
					$gender = $row['Gender'];
                    $skills = $row['Skills'];
                    $volunteer_work = $row['Volunteer_Work'];
					$organizations = $row['Organizations'];
                    $hscompleted = $row['HSCompleted'];
					$unicompleted = $row['UniCompleted'];
					$university = $row['University'];
					$employed = $row['Employed'];
					$industry = $row['Industry'];
                    $startdate = $row['StartDate'];
				}
				//get info from user credential table
				if($result2->num_rows > 0) {
					$row2 = $result2->fetch_assoc();		
					$email = $row2['UserCredential_Email'];
				}
				
				echo "
				<div class='jumbotron'>
					<div class='container'>
						<div style='float:left'>
							<div class='profile-photo'>  <?php //the css this div is styled with pulls the image file ?> </div>
							";
							//If you are looking at your own profile, print edit profile and visualizer button
							if(($type == $_SESSION['type']) && ($id == $_SESSION['user_id'] || $id == $_SESSION['bus_id'])){
							echo "
							<div>
								<form action='profile-editor.php' method='POST' style='margin-bottom:0px;'>
								<input type='submit' class='btn btn-primary btn-lg' id='editbutton' name='edit' value='Edit Profile'>
								<input type='hidden' name='table' value='User'>
								<input type='hidden' name='User_ID' value='".$_SESSION["user_id"]."'>
								<input type='hidden' name='First' value='$fname'>
								<input type='hidden' name='Last' value='$lname'>
								<input type='hidden' name='Age' value='$age'>
								<input type='hidden' name='Location' value='$location'>
								<input type='hidden' name='Gender' value='$gender'>
								<input type='hidden' name='Skills' value='$skills'>
								<input type='hidden' name='Volunteer_Work' value='$volunteer_work'>
								<input type='hidden' name='Organizations' value='$organizations'>
								<input type='hidden' name='High_School_Completed' value='$hscompleted'>
								<input type='hidden' name='University_Completed' value='$unicompleted'>
								<input type='hidden' name='University' value='$university'>
								<input type='hidden' name='Degree' value='$education'>
								<input type='hidden' name='Employed' value='$employed'>
								<input type='hidden' name='Company' value='$company'>
								<input type='hidden' name='Industry' value='$industry'>
								<input type='hidden' name='Position' value='$occupation'>
								<input type='hidden' name='StartDate' value='$startdate'>
							</div>
							<div id='visbuttondiv'>
								<a href='visualizer.php' class='btn btn-success btn-lg' id='visbutton'>Employment-Rate Visualizer</a>
							</div>
							";}
							else { //If looking at someone else's profile
								if($_SESSION['type'] == 'user'){ //Must be a user for connecting
									if($connected == false){
										echo "
										<div>
											<form action='connect.php' method='POST'>
											<input type='submit' class='btn btn-primary btn-lg' id='connbutton' name='connect' value='Connect With $fname'>
											<input type='hidden' name='connect' value='connect'>
											<input type='hidden' name='User_Id1' value='".$_SESSION['user_id']."'>
											<input type='hidden' name='User_Id2' value='".$_POST['id']."'>
										</div>
										";
									} else if ($connected == true) {
										echo "
										<div>
											<form action='disconnect.php' method='POST'>
											<input type='submit' class='btn btn-danger btn-lg' id='connbutton' name='disconnect' value='Disconnect From $fname'>
											<input type='hidden' name='connect' value='connect'>
											<input type='hidden' name='User_Id1' value='".$_SESSION['user_id']."'>
											<input type='hidden' name='User_Id2' value='".$_POST['id']."'>
										</div>
										";
									}
								}
							}
							echo "
						</div>
						<div id='tablediv'>
							<table class='table'>
								<thead>
									<tr>
										<th>".$fname." ".$lname."</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Age: </td>
										<td>".$age."</td>
									</tr>
									<tr>
										<td>Gender: </td>
										<td>".$gender."</td>
									</tr>
									<tr>
										<td>Location: </td>
										<td>".$location."</td>
									</tr>
									<tr>
										<td>Email: </td>
										<td>".$email."</td>
									</tr>
									<tr>
										<td>University: </td>
										<td>".$university."</td>
									</tr>
									<tr>
										<td>Degree: </td>
										<td>".$education."</td>
									</tr>
									<tr>
										<td>Job Title: </td>
										<td>".$occupation."</td>
									</tr>
									<tr>
										<td>Company: </td>
										<td>".$company."</td>
									</tr>
									<tr>
										<td>Industry: </td>
										<td>".$industry."</td>
									</tr>
									<tr>
										<td>Start Date: </td>
										<td>".$startdate."</td>
									</tr>
								</tbody>
							</table>
						</div>
						<br>
						<div id='text-section'>
							<h3><u>Skills</u></h3>
							<p>".$skills."</p>
							<hr>
							<h3><u>Organizations</u></h3>
							<p>".$organizations."</p>
							<hr>
							<h3><u>Volunteer Work</u></h3>
							<p>".$volunteer_work."</p>
						</div>
					</div>
				</div>
				";
			}
		
		
		
			/********* OUTPUT BUSINESS'S INFO ON THEIR PROFILE PAGE ****************/
			//if($_SESSION['type']=='business'){
			if($type == 'business'){
				$sql = "SELECT * FROM Businesses WHERE Bus_Id = '".$id."'";
				$sql2 = "SELECT * FROM BusinessCredentials WHERE BusinessCredential_Id = '".$id."'";
				
				$result =  $link->query($sql);
				$result2 = $link->query($sql2);
				
				//get info from business table
				if($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$fname = $row['Bus_Name'];
					$lname = $row['Industry'];
					$age = $row['Website'];
					$location = $row['Location'];
					$phone = $row['Tele'];				

				}
				//get info from business credential table
				if($result2->num_rows > 0) {
					$row2 = $result2->fetch_assoc();		
					$email = $row2['BusinessCredential_Email'];
				}
				
				echo "
				<div class='jumbotron'>
					<div class='container'>
						<div style='float:left'>
							<div class='profile-photo'>  <?php //the css this div is styled with pulls the image file ?> </div>
							";
							if(($type == $_SESSION['type']) && ($id == $_SESSION['user_id'] || $id == $_SESSION['bus_id'])){
							echo "
							<div>
								<form action='profile-editor.php' method='POST' style='margin-bottom:0px;'>
								<input type='submit' class='btn btn-primary' id='editbutton' name='edit' value='Edit Profile'>
								<input type='hidden' name='table' value='Businesses'>
								<input type='hidden' name='Bus_ID' value='".$_SESSION["bus_id"]."'>
								<input type='hidden' name='Name' value='$fname'>
								<input type='hidden' name='Industry' value='$lname'>
								<input type='hidden' name='Telephone' value='$phone'>
								<input type='hidden' name='Location' value='$location'>
								<input type='hidden' name='Website' value='$age'>
							</div>
							";}
							echo "
						</div>
						<div id='tablediv'>
							<table class='table'>
								<thead>
									<tr>
										<th>".$fname."</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Industry: </td>
										<td>".$lname."</td>
									</tr>
									<tr>
										<td>Location: </td>
										<td>".$location."</td>
									</tr>
									<tr>
										<td>Website: </td>
										<td>".$age."</td>
									</tr>
									<tr>
										<td>Email: </td>
										<td>".$email."</td>
									</tr>
									<tr>
										<td>Phone: </td>
										<td>".$phone."</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				";
			}
			
			$link->close();
		?>

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
