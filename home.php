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

		<?php 
			include 'navbar.php';
			include 'controllers/dbcreds.php';
		?>


	<div class="jumbotron">
		  <div class="container">
			<div class="jumbotron-content">
			<!--<h2>This is your home page!</h2> -->
			<?php 
			global $fname, $lname, $occupation, $location, $email, $phone, $post, $searchString, $search;

				//Connect to the MySQL Account on Azure Server
				include 'controllers/dbcreds.php';
				
				//PRINT OUT USERS FIRST/LAST NAME ON HOMEPAGE
				if($_SESSION['type'] == 'user'){
					$sql = "SELECT Fname, Lname FROM User WHERE User_Id = '".$_SESSION['user_id']."'";
					$result =  $link->query($sql);
					if(!$sql){
						die("failed");
					}
					if($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$fname = $row['Fname'];
						$lname = $row['Lname'];
					}
					echo "<font size = '6'> Welcome to your home page, $fname $lname!";
				}
				
				
				//PRINT OUT BUSINESS'S NAME ON HOMEPAGE
				if($_SESSION['type'] == 'business'){
					$sql = "SELECT Bus_Name FROM Businesses WHERE Bus_Id = '".$_SESSION['bus_id']."'";
					$result =  $link->query($sql);
					if(!$sql){
						die("failed");
					}
					if($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$fname = $row['Bus_Name'];
					}
					echo "<font size = '6'> Welcome to your home page, $fname!";	
				}
				
			?>
			<br><br>
			<p>Built from the ground up for the Professionals of the world. Use PSN to foster and grow <i><b>your</b></i> Professional Social Network. Join today.</p>
			<br>
	
		<?php
			if($_SESSION['type'] == 'user'){
				$sql = "SELECT * FROM Connections WHERE User_Id1='".$_SESSION['user_id']."' OR User_Id2='".$_SESSION['user_id']."'";
				$result = $link->query($sql);
				
				if($result->num_rows > 0){
					//echo "<div class='jumbotron'>";
					echo "<table class='table' style='color:white;'>";
					echo "<thead><tr><th>Connections:</th><th>User Id</th></tr></thead><tbody>";
					
						while($row = $result->fetch_assoc()){							
							//Picking the right user id's to output
							if($row['User_Id2'] == $_SESSION['user_id']){
								$outputName = $row['User_Id1'];
								$type = $_SESSION['type'];
									if($type == 'user'){
										$id = $_SESSION['user_id'];
									}
							} else {
								$outputName = $row['User_Id2'];
								$type = $_SESSION['type'];
									if($type == 'user'){
										$id = $_SESSION['user_id'];
									}								
							}
											
							$sql2 = "SELECT User_Id, 'User' as type FROM User WHERE User_Id = '".$outputName."'";
							$result2 = $link->query($sql2);
							
							//OUTPUT CONNECTIONS AND GO TO PROFILE
							foreach($result2 as $output){					
								echo "<tr><td></td><td>".$outputName."</td>";					
								echo "<td><form action='profile.php' method='POST'>";
								echo "<input type='submit' class='btn btn-primary' name='display' value='View Profile'>";
								echo "<input type='hidden' name='id' value='$output[User_Id]'>";
								echo "<input type='hidden' name='type' value='$output[type]'>";							
								echo "</td></form></tr>";	
							}
						}
						echo "</tbody></table>";
					
				} else {
					//echo "<div class='jumbotron'>";
						echo "<table class='table table-hover' style='color:white;'>";
						echo "<th> You have no connections! </th><tbody>";
					echo "</tbody></table>";
				}
						
			}
		?>

			</div>
		</div>
	</div>

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