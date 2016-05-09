<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        //If the user is not logged in, redirect to the login page
        session_start();
        if(strcmp($_SESSION['type'],'user') !== 0 && strcmp($_SESSION['type'],'business') !== 0){
                header('Location: index.php');
        }

        //Connect to the database through the automated script
        include 'controllers/dbcreds.php';
?>
<?php
//display non-editable textbox for attribute $key
function printNonEditable($key) {
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control text-input' id='nonEditable' type='text' name='".$key."' value='".$_POST[$key]."' readonly>";
	echo "</div>";
}

//display editable textbox for attribute $key
function printInput($key) {
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control text-input' type='text' name='".$key."' value='".$_POST[$key]."'>";
	echo "</div>";
}

//display editable textbox for numeric attribute $key
function printNumeric($key) {
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control text-input' type='number' name='".$key."' value='".$_POST[$key]."'>";
	echo "</div>";
}

//display editable textbox for timedate attribute $key
function printDatetime($key) {
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label>";
	echo "<input class='form-control text-input' type='date' name='".$key."' value='".$_POST[$key]."'>";
	echo "</div>";
}

//display editable radio button for input $key
function printRadio($key){
	echo "<div class='form-group'>";
	echo "<label class='inputdefault'>".$key."</label><br>";
	//echo "<input class='form-control' type='radio' name='".$key."' value='".$_POST[$key]."'>";
	if($_POST[$key] == 'n'){
		echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='n' checked> No<br>";
		echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='y'> Yes<br>";
	} else if ($_POST[$key] == 'y'){
		echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='n'> No<br>";
		echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='y' checked> Yes<br>";
	}
	if($key == 'University_Completed'){
		if($_POST[$key] == 'a'){
			echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='a' checked> Attending<br>";
		} else {
			echo "<input class='text-input' id='radio' type='radio' name='".$key."' value='a'> Attending<br>";
		}
	}
	echo "</div>";
}

//display editable text area for input $key
/*function printTextarea($key){
        echo "<div class='form-group'>";
        echo "<label class='inputdefault'>".$key."</label>";
		echo "<input class='form-control text-input' type='textarea' name='".$key."' value='".$_POST[$key]."'>";
        echo "</div>";
}*/

function printTextarea($key){
        echo "<div class='form-group'>";
        echo "<label class='inputdefault'>".$key."</label>";
		echo "<textarea class='form-control text-input' type='textarea' name='".$key."'>".$_POST[$key]."</textarea>";
        echo "</div>";
}

//editable form for the records from the User table
function displayUser() {
	echo "<div class='jumbotron' style='margin-left:64px;margin-right:64px;'>";
	echo "<form role='form' action='profile-editor.php' method='POST' >";
	echo "<input type='hidden' name='table' value='User'>";
	echo "<h2 class='form-header'>Personal Information</h2>";
	printNonEditable('User_ID');
	printInput('First');
	printInput('Last');
	printNumeric('Age');
	printInput('Location');
	printNonEditable('Gender');
	echo "<h2 class='form-header'>Education</h2>";
	printRadio('High_School_Completed');
	printRadio('University_Completed');
	printInput('University');
	printInput('Degree');
	echo "<h2 class='form-header'>Work Experience</h2>";
	printRadio('Employed');
	printInput('Company');
	printInput('Industry');
	printInput('Position');
	printDatetime('StartDate');
	echo "<h2 class='form-header'>Miscellaneous</h2>";
	printTextarea('Skills');
	printTextarea('Volunteer_Work');
	printTextarea('Organizations');
	echo "<input class='btn btn-info btn-lg' type='submit' name='save' style='margin-left:100px;' value='Save'>";
	echo "<a class='btn btn-success btn-lg' href='profile.php' style='float:right;margin-right:80px;'>Return to Profile</a>";
	echo "</form>";		
	
	echo "</div>";
}

//editable form for the records from the Businesses table
function displayBusinesses() {
	echo "<div class='jumbotron' style='margin-left:64px;margin-right:64px;'>";
	echo "<form role='form' action='profile-editor.php' method='POST' >";
	echo "<input type='hidden' name='table' value='Businesses'>";
	echo "<h2 class='form-header'>General Information</h2>";
	printNonEditable('Bus_ID');
	printInput('Name');
	printInput('Industry');
	printInput('Location');
	printNumeric('Telephone');
	printInput('Website');
	echo "<input class='btn btn-info btn-lg' type='submit' name='save' style='margin-left:100px;' value='Save'>";
	echo "<a class='btn btn-success btn-lg' href='profile.php' style='float:right;margin-right:80px;'>Return to Profile</a>";
	echo "</form>";
	echo "</div>";
}

//function for saving updated User values
function saveUser() {
	global $link;
	$sql = "UPDATE User SET Fname=?, Lname=?, Age=?, Location=?, Skills=?, Volunteer_Work=?, Organizations=?, HSCompleted=?,
		UniCompleted=?, University=?, Degree=?, Employed=?, Company=?, Industry=?, Position=?, StartDate=? WHERE User_Id = ?";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "sssssssssssssssss", htmlspecialchars($_POST['First']), htmlspecialchars($_POST['Last']),
			htmlspecialchars($_POST['Age']), htmlspecialchars($_POST['Location']), htmlspecialchars($_POST['Skills']),
			htmlspecialchars($_POST['Volunteer_Work']), htmlspecialchars($_POST['Organizations']), 
			htmlspecialchars($_POST['High_School_Completed']), htmlspecialchars($_POST['University_Completed']),
			htmlspecialchars($_POST['University']), htmlspecialchars($_POST['Degree']), htmlspecialchars($_POST['Employed']),
			htmlspecialchars($_POST['Company']), htmlspecialchars($_POST['Industry']), htmlspecialchars($_POST['Position']),
			htmlspecialchars($_POST['StartDate']), htmlspecialchars($_POST['User_ID'])) or die("Bind Param");
		if(mysqli_stmt_execute($stmt)){
			echo "<h2>Successfully Saved Record</h2>";
		} else {
			echo "<h2>Failure</h2>";
		}
	} else {
		echo "<h2>Prepare Failed</h2>";
	}
}

//function for saving updated Businesses values
function saveBusinesses() {
	global $link;
	$sql = "UPDATE Businesses SET Bus_Name=?, Industry=?, Location=?, Tele=?, Website=? WHERE Bus_Id=?";
        if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssssss", htmlspecialchars($_POST['Name']), htmlspecialchars($_POST['Industry']),
				htmlspecialchars($_POST['Location']), htmlspecialchars($_POST['Telephone']), htmlspecialchars($_POST['Website']),
				htmlspecialchars($_POST['Bus_ID'])) or die("Bind Param");
                if(mysqli_stmt_execute($stmt)){
                        echo "<h2>Successfully Saved Record</h2>";
                } else {
                        echo "<h2>Failure</h2>";
                }
        } else {
                echo "<h2>Prepare Failed</h2>";
        }
}

?>
<script>
//function for deleting User
function deleteUser(id) {
	var e = document.getElementById(id);
		e.style.display = 'block';
}
</script>

<html>
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<!-- Bootstrap core CSS -->
		<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="jumbotron.css" rel="stylesheet">

		<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
		<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

		<title>PSN</title>
		<style>
			h2.form-header{
				text-align: center;
			        color: #8c8c8c;
			        padding-bottom:10px;
			        text-shadow: 0px 10px 8px rgb(0,0,0);
			}
			h2.form-header:hover{
			        color: white;
			}
			#nonEditable:read-only{
				background-color: grey;
				color: black;
			}
		</style>
	</head>
	<body>
	<?php include('navbar.php'); ?>
		<div class="container">
<?php
if(isset($_POST['edit'])) {//submit came from index.php to update
	if(isset($_POST['table'])) {//do we have table information?
		switch($_POST['table']) {//what table are we updating
			case "User":
				displayUser();
				break;
			case "Businesses":
				displayBusinesses();
				break;
			default:
				echo "<h2>Failure</h2>";
				break;
		}	
	} else {//no table info found
		echo "<h2>No Table Received</h2>";
	}
} else if(isset($_POST['save'])) {//submit came from request to save form data
	if(isset($_POST['table'])) {//do we have table information?
		switch($_POST['table']) {//what table are we saving
                        case "User":
                                displayUser();
				saveUser();
                                break;
                        case "Businesses":
                                displayBusinesses();
				saveBusinesses();
                                break;
                        default:
                                echo "<h2>Failure</h2>";
                                break;
		}
	}
} else if(isset($_POST['delete'])) {
		if(isset($_POST['table'])) {//do we have table information?
			switch($_POST['table']) {//what table are we deleting
				case "User":
					deleteUser();
					break;
				case "Businesses":
					deleteBusiness();
					break;
				default:
					echo "<h2>Failed to delete profile</h2>";
					break;
			}
		}
	} else {
	echo "<h2>Nothing Received</h2>";
	}	
?>
		<!-- POPUP BOX TO DELETE USER -->
		<div id='deleteButton' class='jumbotron'>
		<a href="javascript:void(0)" class='btn btn-danger btn-lg' name='delete' value='Delete' onclick="deleteUser('popupbox');" style='float:center;margin-center:80px;'>Delete Profile</a>
		</div>	
		<div id = "popupbox" style="display:none;" class="popupClass">
			<h2><p style ="text-align:center" >"Are you sure you want to delete your profile?"</p></h2>
			<div id ="popupbox">
			<button class="deleteBtn"><a href= "deleteProfile.php" name ='delete' value='Delete' >Yes</a></button>
			<button class="deleteBtn"><a href= "profile.php" name ='doNotDelete' value='NotDelete' >No</a></button>
			<div>
		</div>
		
</div>
</body>
</html>
