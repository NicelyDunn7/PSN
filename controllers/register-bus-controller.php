<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
            //exit;
        }


?>
<?php
	if(isset($_POST['submit'])) { // Was the form submitted?

		//Connect to the MySQL Account on Azure Server
                session_start();
                $_SESSION['reg-error'] = 0;
                
                include 'dbcreds.php';

	            $link->autocommit(FALSE);

		//Take user input for username and password, salt and hash the password,
                //and store the new account in the database
                $sql = "INSERT INTO BusinessCredentials (BusinessCredential_Email, BusinessCredential_Password, BusinessCredential_Id) VALUES(?, ?, ?);";
		$sql2 = "INSERT INTO Businesses (Location, Industry, Bus_Name, Bus_Id, Website, Tele) VALUES (?, ?, ?, ?, ?, ?);";
	        
		$stmt1 = $link->prepare($sql);
		$stmt2 = $link->prepare($sql2);

                $location = htmlspecialchars($_POST['city'].', '.$_POST['state/prov'].', '.$_POST['country'].', '.$_POST['zip-code']);
                $industry = htmlspecialchars($_POST['field/industry']);
                $bus_name = htmlspecialchars($_POST['bname']);
                $bus_id = htmlspecialchars($_POST['userid']);
                $website = htmlspecialchars($_POST['website']);
                $tele = htmlspecialchars($_POST['phone']);
                $bus_email = htmlspecialchars($_POST['email']);
                $bus_pass = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT) or die("PassHashing");
	
		mysqli_stmt_bind_param($stmt1, 'sss', $bus_email, $bus_pass, $bus_id) or die("bind param1");
		mysqli_stmt_bind_param($stmt2, 'ssssss', $location, $industry, $bus_name, $bus_id, $website, $tele) or die("bind param2");		

		if(mysqli_stmt_execute($stmt1) == false){
                        //echo 'First query failed: ' . $link->error();
                        echo '<br>';
                        $_SESSION['reg-error'] = 1;
        }
                
        $stmt1->close();
        
        if(mysqli_stmt_execute($stmt2) == false){
                        //echo 'Second query failed: ' . $link->error();
                        echo '<br>';
                        $_SESSION['reg-error'] = 1;
        }

        $stmt2->close();
        $link->commit();
        $link->close();
		
        if($_SESSION['reg-error'] == 1){
            echo '<h2> <u>There was an error in processing your registration: </u> </h2><br>';

        }else{
            header('Location: ../index.php');
        }

		
        }else{
            header('Location: ../index.php');
        }
?>
