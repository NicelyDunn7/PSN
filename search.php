<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        //If the user is not logged in, redirect to the login page
        session_start();
        if(strcmp($_SESSION['type'],'user') !== 0 && strcmp($_SESSION['type'],'business') !== 0){
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
		<meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1"> 
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
			tbody tr:hover{
				color: black;
			}
			.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
				background-color: grey;
			}
			table tr {
				color: lightgrey;
			}
			h2.form-header{
				text-align: left;
			    color: lightgrey;
			    padding-bottom:10px;
			    text-shadow: 0px 10px 8px rgb(0,0,0);
			}
			h2.form-header:hover{
			    color: white;
			}
		</style>
	</head>
	
<p><body>

	<?php include 'navbar.php' ?>
	
	<div class="jumbotron">
	  <div class="container">
	  <div class="jumbotron-content">
		<h2 class="form-header">Search Results For "<?php echo $_POST['searchS']; ?>"...</h2><br>
		<?php 
			global $fname, $lname, $occupation, $location, $email, $phone, $post, $searchString, $search;
			//Connect to the MySQL Account on Azure Server
			include 'controllers/dbcreds.php';
				
			if(isset($_POST['searchS'])) {
				/*
				$searchString = $_POST['searchS'];
				echo $searchString;
				if(!$searchString){
					echo "search string failed";
				}
				//query for db table				
				$sql = "SELECT User_Id FROM User WHERE Fname = '$searchString'";
				$busSql ="SELECT Bus_Id FROM User WHERE Fname = '$searchString'";
				$result =  $link->query($sql);
								
				if(!$result){
					echo "result failed";
				}				
				
				if($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$search = $row['User_Id'];
				}
				*/
				
				//Begin Danny's Code
				$searchString = htmlspecialchars($_POST['searchS']);
				$sql = "(SELECT User_Id, 'User' as type FROM User WHERE Fname LIKE '%".$searchString."%' OR
						Lname LIKE '%".$searchString."%') UNION (SELECT Bus_Id, 'Business' as type FROM 
						Businesses WHERE Bus_Name LIKE '%".$searchString."%')";
				$result = $link->query($sql);
				if($result->num_rows > 0){
					echo "<table class='table table-hover' style='color:white;'>";
					echo "<thead><tr><th>ID</th><th>Account</th></tr></thead><tbody>";
					
					while($row = $result->fetch_assoc()){
						echo "<tr><td>".$row['User_Id']."</td><td>".$row['type']."</td>";
						echo "<td><form action='profile.php' method='POST'>";
						echo "<input type='submit' class='btn btn-primary' name='display' value='View Profile'>";
						echo "<input type='hidden' name='id' value='".$row['User_Id']."'>";
						echo "<input type='hidden' name='type' value='".$row['type']."'>";
						echo "</td></form></tr>";
						
						//echo "ID: ".$row['User_Id']." - Account: ".$row['type']."<br>";
					}
					echo "</tbody></table>";
				} else {
					echo "0 Results";
				}
				
				$_SESSION['searchString']= $search;

			/*
			echo "<form action= 'displaySearch.php'>";
			echo "<input type = 'hidden' name='varname' value = $search />";
			echo "<input type = 'submit' value = $search />";
			echo "<a href = 'displaySearch.php' onclick='$_POST[$search]'> $search </a>";
			echo "</form>";*/
			}
			

		?>
		<br><br>
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
</p>