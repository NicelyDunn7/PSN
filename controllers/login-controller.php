<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
            //exit;
        }
 
?>
<?php
       if(empty($_POST['Email']) == true || empty($_POST['Password']) == true){
            $_SESSION['invalid-credentials'] = 1;
            header('Location: https://mizseng.centralus.cloudapp.azure.com/index.php');
        }else if(isset($_POST['submit'])) { // Was the form submitted?
        
        //Connect to the MySQL Account on Azure Server             
		include 'dbcreds.php';
        session_start();
        
		if (strcmp($_POST['is-business'],'yes') == 0){
			$bus_email = $_POST['Email'];
                	if($stmt = $link->prepare("SELECT BusinessCredential_Id, BusinessCredential_Email, BusinessCredential_Password
                	                           FROM BusinessCredentials WHERE BusinessCredential_Email = ?")){
                	        $stmt->bind_param('s', htmlspecialchars($bus_email));
                	        $stmt->execute();
                	        $stmt->bind_result($bus_id, $bus_email, $bus_pass);
                	        $stmt->fetch();
                	        $stmt->close();

                	        if(password_verify($_POST['Password'], $bus_pass)){
                	                $_SESSION['type'] = "business";
                	                $_SESSION['bus_id'] = $bus_id;
                                    $_SESSION['invalid-credentials'] = 0;
                	                header('Location: https://mizseng.centralus.cloudapp.azure.com/home.php');
                	        } else {
                	                echo "<h4>Authentication Failure</h4>";
                                    $_SESSION['invalid-credentials'] = 1;
                	        }
                	} else {
                	        echo "<h4>Database Error</h4>";
                	}
		}else {
                        $user_email = $_POST['Email'];
                        if($stmt = $link->prepare("SELECT UserCredential_Id, UserCredential_Email, UserCredential_Passward
                                                   FROM UserCredentials WHERE UserCredential_Email = ?")){
                                $stmt->bind_param('s', htmlspecialchars($user_email));
                                $stmt->execute();
                                $stmt->bind_result($user_id, $user_email, $user_pass);
                                $stmt->fetch();
                                $stmt->close();

                                if(password_verify($_POST['Password'], $user_pass)){
                                        
                                        $_SESSION['type'] = "user";
                                        $_SESSION['user_id'] = $user_id;
                                        $_SESSION['invalid-credentials'] = 0;
                                        header('Location: https://mizseng.centralus.cloudapp.azure.com/home.php');
                                } else {
                                        echo "<h4>Authentication Failure</h4>";
                                        $_SESSION['invalid-credentials'] = 1;
                                }
                        } else {

                                echo "<h4>Database Error</h4>";
                        }
		}
	}else{
        header('Location: https://mizseng.centralus.cloudapp.azure.com/index.php');
    }

    if($_SESSION['invalid-credentials'] == 1)
        header('Location: https://mizseng.centralus.cloudapp.azure.com/index.php');

?>
