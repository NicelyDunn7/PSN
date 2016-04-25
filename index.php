<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
            //exit;
        }
        //If already logged in, redirect to the home page
        session_start();
        if(strcmp($_SESSION['type'],'business') == 1 || strcmp($_SESSION['type'],'user') == 1){
                header('Location: https://mizseng.centralus.cloudapp.azure.com/home.php');
        }

	
  if(isset($_POST['submit'])){

		if($_POST['is-business-radio'] == 'no')
			header('Location: register.php');
		else if($_POST['is-business-radio'] == 'yes')
			header('Location: register-bus.php');


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

  <!--
<script type="text/javascript";>
  function validate(){
    var retval=false;

  }
</script>
-->

	

<nav id = "navbar-container" class="navbar navbar-inverse navbar-fixed-top">
  <table id = "table-view" width = "100%">
    <tr>
      <div class="container">
        <td id = "title-field" width = "50%">
          <div class="navbar-header">
              <a id = "title" class="navbar-brand" size='4' href="index.php"><p class="shadow">PSN: The Professional's Social Network</p></a>
          </div>
        </td>
        <td id = "login-field" width = "50%">
          <div id = "navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right" method="POST" action='https://mizseng.centralus.cloudapp.azure.com/controllers/login-controller.php'>
              <div class="form-group">
                <?php
                  if($_SESSION['invalid-credentials'] == 1){
                    echo '<input type="text" placeholder="Invalid" class="form-control text-input" style = "border:3px solid #FF0000" name="Email">';
                     echo '<input type="password" placeholder="Invalid" class="form-control text-input" name="Password" style = "border:3px solid #FF0000">';
                  }else{
                    echo '<input type="text" placeholder="Email" class="form-control text-input" name="Email">';
                    echo '<input type="password" placeholder="Password" class="form-control text-input" name="Password">';
                  }
                ?>
              </div>
              <button id = "login-button" type="submit" name = "submit" class="btn nav-btn"> </button><br>
              <input type="checkbox" name="is-business" value="yes" class="checkbox-input"><font color="white" size='2'>&nbsp;Check if you are a Business</font>
            </form> 
          </div><!--/.navbar-collapse -->
        </td>
      </div>
    </tr>
  </table>
</nav>



	<div class="jumbotron">
      <div class="container">
        <div class="jumbotron-content">
          <h2><b>Meet the world's most Professional Social Network...</b></h2>
          <br><br>
          <h4>Built from the ground up for the Professionals of the world. Use PSN to foster and grow <i><b>your</b></i> Professional Social Network. Join today.</h4>
          <br><br>
          <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
        	 <input type="submit" name="submit" class="btn btn-primary btn-lg submit" value="Sign Up">
            <?php
                if(!isset($_POST['is-business-radio'])  &&  isset($_POST['submit'])){
                    echo '<font color="red" id="business-prompt" style="text-shadow: 0px 0px 10px rgb(255, 0, 0)">Are you a Business?</font>';
                }else{
                  echo '<font color="white" id="business-prompt">Are you a Business?</font>';
                }
            ?>
        	 <input class="init-radio check" type="radio" name="is-business-radio" value="no"><font color="white">No</font>
        	 <input class="init-radio check" type="radio" name="is-business-radio" value="yes"><font color="white">Yes</font>
          </form>
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


