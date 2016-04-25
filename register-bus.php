<?php
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        session_start();

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
      	<a id = "title" class="navbar-brand" href="https://mizseng.centralus.cloudapp.azure.com/index.php">PSN: The Professional's Social Network</a>
      	</td>
      </div>
		<td width = "30%">	</td>
      <td id = "login-field" width = "20%">
      	<div id = "header">
			<h3 class="header"> Business Registration </h3>
      	</div>
      </td>
</tr></table>
    </nav>



	<div class="jumbotron">
      <div class="container">
        <form action="https://mizseng.centralus.cloudapp.azure.com/controllers/register-bus-controller.php" method="POST">
				<table id = "form-view" width = "100%">
					<tr width="100%">
						<td class="table-header" colspan="4" align="center">
							<h2>General Information</h2>
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Business Name:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "bname" placeholder = "Business Name" required="yes"> 
						</td>
						<td class="table-label"width="8%">Field/Industry:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="text" name = "field/industry" placeholder = "Field/Industry" required="yes">
						</td>
					</tr>
					<tr>
						<td width="8%" class="table-label">
							User ID:
						</td>
						<td width="30%" class="field">
							<input class="form-control text-input" type="text" id="userid" name="userid" placeholder="Enter desired User ID" required="yes">
						</td>
						<td width="8%" class="table-label">
							Confirm:
						</td>
						<td width="30%" class="field">
							<input class="form-control text-input" type="text" id="userid-confirm" name="userid-confirm" placeholder="Confirm your User ID" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">E-mail:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="email" name = "email" placeholder = "E-mail"> 
						</td>
						<td class="table-label"width="8%">Confirm:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="email" name = "email-confirm" placeholder = "E-mail" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Password:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="password" name = "password" placeholder = "Password" required="yes"> 
						</td>
						<td class="table-label"width="8%">Confirm:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="password" name = "password-confirm" placeholder = "Password" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">Phone:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="number" name = "phone" placeholder = "Phone" required="yes"> 
						</td>
						<td class="table-label"width="8%">Website:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="text" name = "website" placeholder = "Website" required="yes">
						</td>
					</tr>

					<tr>
						<td class="table-label" width="8%">Country:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "country" placeholder = "Country" required="yes"> 
						</td>
						<td class="table-label"width="8%">State/Prov:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="text" name = "state/prov" placeholder = "State/Providence" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-label" width="8%">City:</td>
						<td width="30%"class="field"> 
							<input class="form-control text-input" type="text" name = "city" placeholder = "City" required="yes"> 
						</td>
						<td class="table-label"width="8%">Zip-Code:</td>
						<td width="30%" class="field" > 
							<input class="form-control text-input" type="number" name = "zip-code" placeholder = "Zip-Code" required="yes">
						</td>
					</tr>
					<tr>
						<td class="table-label">
							Description:
						</td>
						<td class="field" colspan="3">
							<textarea id = "description" class="form-control text-input" rows="5" name = 'description' required="yes">

							</textarea>
						</td>
					</tr>
				</table>

				<table id = "button-table" >
					<tr> 
						<td class="field">
							<input id = "button" class=" btn btn-primary btn-lg" type="submit" name="submit" value="Register"/>
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


