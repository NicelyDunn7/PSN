<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        session_start();
        $_SESSION['visited-reg-form'] = 1;
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

	

<nav id = "navbar-container" class="navbar navbar-inverse navbar-fixed-top">
<table id = "table-view" width = "100%"><tr>
      <div class="container">
      	<td id = "title-field" width = "50%">
      	<a id = "title" class="navbar-brand" href="index.php">PSN: The Professional's Social Network</a>
      	</td>
      </div>
		<td width = "30%">	</td>
      <td id = "login-field" width = "20%">
      	<div id = "header">
			<h3 class="header"> Account Registration </h3>
      	</div>
      </td>
</tr></table>
    </nav>



	<div class="jumbotron">
      <div class="container">
        <form action="controllers/register-controller.php" method="POST">
				<table id = "form-view" width = "100%">
					<tr width="100%">
						<td class="table-header" colspan="4" align="center">
							<h2>Personal Information</h2>
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">First Name:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "fname" placeholder = "First Name" required="yes" maxlength="40"> 
						</td>
						<td class="table-label"width="8%">Last Name:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="text" name = "lname" placeholder = "Last Name" required="yes" maxlength="40">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">E-mail:</td>
						<td width="30%"class="field">
							<?php 
								if($_SESSION['invalid-email'] == 1){
									echo '<input class="form-control invalid text-input" type="email" name = "email" value="Invalid E-mail" placeholder = "Invalid E-mail"> ';
								}else{
									echo '<input class="form-control text-input" type="email" name = "email" placeholder = "E-mail" required="yes" maxlength="40"> ';
								}
							?> 
						</td>
						<td class="table-label"width="8%">Confirm:</td>
						<td width="30%" class="field" > 
							<?php
								if($_SESSION['invalid-email']==1){
									echo '<input class="form-control invalid text-input" type="email" name="email-confirm" value="Invalid-Email" placeholder="Confirm E-mail"';
								}else{
									echo '<input class="form-control text-input" type="email" name = "email-confirm" placeholder = "E-mail" required="yes">';
								}
							?>
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Password:</td>
						<td width="30%"class="field"> 
							<?php
								if($_SESSION['invalid-pw'] == 1){
									echo '<input class="form-control invalid text-input" value="Invalid Password" type="password" name = "password" placeholder = "Password"> ';
								}else{
									echo '<input class="form-control text-input" type="password" name = "password" placeholder = "Password" required="yes" maxlength="20"> ';
								}
							?>
						</td>
						<td class="table-label"width="8%">Confirm:</td>
						<td width="30%" class="field" > 
							<?php
								if($_SESSION['invalid-pw'] == 1){
									echo '<input class="form-control invalid text-input" value="Invalid Password" type="password" name = "password-confirm" placeholder = "Password"> ';
								}else{
									echo '<input class="form-control text-input" type="password" name = "password-confirm" placeholder = "Password" required="yes" maxlength="20"> ';
								}
							?>
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Country:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "country" placeholder = "Country" required="yes" required="yes" maxlength="15"> 
						</td>
						<td class="table-label"width="8%">State/Providence:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="text" name = "state/providence" placeholder = "State/Providence" required="yes" maxlength="10">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">City:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "city" placeholder = "City" required="yes" maxlength="10"> 
						</td>
						<td class="table-label"width="8%">Zip Code:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="number" name = "zipcode" placeholder = "Zip-Code" required="yes" maxlength="5">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Age:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="number" name = "age" placeholder="Enter Age" min="18" required="yes" maxlength="2">
						</td>
						<td class="table-label" width="8%">Gender:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "gender" placeholder="Gender" required="yes" maxlength="6"> 
						</td>
					</tr>
					<tr>
						<td width="8%" class="table-label">
							User ID:
						</td>
						<td width="30%" class="field">
							<input class="form-control text-input" type="text" id="userid" name="userid" placeholder="Enter desired User ID" required="yes" maxlength="10">
						</td>
						<td width="8%" class="table-label">
							Confirm:
						</td>
						<td width="30%" class="field">
							<input class="form-control text-input" type="text" id="userid-confirm" name="userid-confirm" placeholder="Confirm your User ID" required="yes" maxlength="10">
						</td>
					</tr>
					<tr>
						<td class="table-header" colspan="4" align="center">
							<h2>Education</h2>
						</td>
					</tr>
					<tr>
						<td class="table-label" colspan="2">
							High School or Equivalent Completed:
							<input class="text-input" id="radio" type="radio" name="primary-school" value="y">Yes
							<input class="text-input" id="radio" type="radio" name="primary-school" value="n">No<br>
						</td>
						<td class="table-label">
							College/University:
						</td>
						<td class="field">
							<input class="text-input" id="radio" type="radio" name="completed-college" value="n">No
							<input class="text-input" id="radio" type="radio" name="completed-college" value="y">Completed
							<input class="text-input" id="radio" type="radio" name="completed-college" value="a">Attending<br>
						</td>
					</tr>
					<tr>
						<td class="table-label"width="8%">School:</td>
						<td>
							<input class="form-control text-input" type="text" name="highschool" placeholder="School Name" required="yes" maxlength="100">
						</td>
						<td class="table-label">
							Degree(s):
						</td>
						<td class="special-field">
							<input class="form-control text-input" type="text" name="degrees" placeholder="Degree(s)" required="yes" maxlength="100">
						</td>
					</tr>
					<tr>
						<td class="table-header" colspan="4" align="center">
							<h2>Work</h2>
						</td>
					</tr>
					<tr>
						<td class="table-label">
							Currently Employed:
						</td>
						<td class="field">
							<input class="text-input" id="radio" type="radio" name="currently-employed" value="y">Yes
							<input class="text-input" id="radio" type="radio" name="currently-employed" value="n">No<br>
						</td>
					</tr>
					<tr>
						<td class="table-label">
							Company:
						</td>
						<td class="special-field">
							<input class="form-control text-input" type="text" name="company" placeholder="Company Name" required="yes" maxlength="50">
						</td>
						<td class="table-label" width="8%">
							Field/Industry:
						</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "field/industry" placeholder = "Field/Industry of Work" required="yes" maxlength="50"> 
						</td>
					</tr>
					<tr>
						<td class="table-label"width="8%">
							Job Title:
						</td>
						<td width="30%" class="special-field" > 
							<input class="form-control text-input" type="text" name = "job-title" placeholder = "Job Title" required="yes" maxlength="50">
						</td>
						<td class="table-label" width="8%">
							Start-Date:
						</td>
						<td class="field">
							<input class="form-control text-input" type="date" name="job-start" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-header" colspan="4" align="center">
							<h2>Skills</h2>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="field">
							<textarea class="form-control text-input" name="skills" id="skills" placeholder="Enter any pertinent skills you may have here..."></textarea>
						</td>
					</tr>
					<tr>
						<td class="table-header" colspan="4" align="center">
							<h2>Volunteer Work</h2>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="field">
							<textarea class="form-control text-input" name="volunteer-work" id="volunteer-work" placeholder="Enter any volunteer work you've completed here..."></textarea>
						</td>
					</tr>
					<tr>
						<td class="table-header" colspan="4" align="center">
							<h2>Organizations</h2>
						</td>
					</tr>
					<tr>
						<td colspan="4" class="field">
							<textarea class="form-control text-input" name="organizations" id="organizations" placeholder="List any organizations you may be a part of. Please separate organization names by commas (',')"></textarea>
						</td>
					</tr>
				</table>

				<table id = "button-table" >
					<tr> 
						<td class="field">
							<input id = "button" class="btn btn-primary btn-lg" type="submit" name="submit" value="Register"/>
           				</td>
           				<td class="field">
           					<a href="index.php" id = "button" class="btn btn-danger btn-lg">Cancel</a>		
						</td>
					</tr>
				</table>
		</form>
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


