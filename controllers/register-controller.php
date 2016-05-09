<?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
            //exit;
        }
        session_start();

?>
<?php

	if(isset($_POST['submit'])) { // Was the form submitted?

		include 'dbcreds.php';

		//Darius checking if submitted form values are correct//

		/*
			if(email already exists in database){
				$_SESSION['invalid-email'] = 1;
				header('Location:https://mizseng.cloudapp.azure.com/register.php');
			}else{
				$_SESSION['invalid-email'] = 0;
			}
		*/

		/*

		if(strcmp($_POST['email'], $_POST['email-confirm'] != 0)){		//if 'email' and 'confirm-email' don't match
			$_SESSION['invalid-email'] = 1;	//alerts user that email is invalid on register.php page
			header('Location: https://mizseng.cloudapp.azure.com/register.php');
		}else{
			$_SESSION['invalid-email'] = 0;
		}

		if(strcmp($_POST['password'], $_POST['password-confirm']) != 0){	//if passwords aren't equal
			$_SESSION['invalid-pw'] = 1;
			header('Location: https://mizseng.cloudapp.azure.com/register.php');
		}else{
			$_SESSION['invalid-pw'] = 0;
		}

		*/

		//Darius finished checking if submitted values are correct//




		//Connect to the MySQL Account on Azure Server
	    $link->autocommit(FALSE);
		
		//Take user input for username and password, salt and hash the password,
                //and store the new account in the database
                $sql = "INSERT INTO UserCredentials (UserCredential_Email, UserCredential_Passward, UserCredential_Id) VALUES (?, ?, ?)";
		$sql2 = "INSERT INTO User(Fname, Lname, User_Id, Age, Location, Gender, Skills, Volunteer_Work, Organizations, HSCompleted,
			 UniCompleted, University, Degree, Employed, Company, Industry, Position, StartDate) VALUES 
			 (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                //if ($stmt = mysqli_prepare($link, $sql)) {
		$stmt1 = $link->prepare($sql);
		$stmt2 = $link->prepare($sql2);

                $user_email = htmlspecialchars($_POST['email']);
                $user_pass = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT) or die("bind param");
                $user_id = htmlspecialchars($_POST['userid']);
                $fname = htmlspecialchars($_POST['fname']);
                $lname = htmlspecialchars($_POST['lname']);
                $age = htmlspecialchars($_POST['age']);
                $location = htmlspecialchars($_POST['country']);
                $gender = htmlspecialchars($_POST['gender']);
                $skills = htmlspecialchars($_POST['skills']);
                $volunteer_work = htmlspecialchars($_POST['volunteer-work']);
		$organizations = htmlspecialchars($_POST['organizations']);
		$hscompleted = htmlspecialchars($_POST['primary-school']);
		$unicompleted = htmlspecialchars($_POST['completed-college']);
		$university = htmlspecialchars($_POST['highschool']);
		$degree = htmlspecialchars($_POST['degrees']);
		$employed = htmlspecialchars($_POST['currently-employed']);
		$company = htmlspecialchars($_POST['company']);
		$industry = htmlspecialchars($_POST['field/industry']);
		$position = htmlspecialchars($_POST['job-title']);
		$startdate = htmlspecialchars($_POST['job-start']);

		mysqli_stmt_bind_param($stmt1, 'sss', $user_email, $user_pass, $user_id) or die("bind param");
		mysqli_stmt_bind_param($stmt2, 'ssssssssssssssssss', $fname, $lname, $user_id, $age, $location, $gender, $skills, 
			$volunteer_work, $organizations, $hscompleted, $unicompleted, $university, $degree, $employed,
			$company, $industry, $position, $startdate) or die("bind param");

		echo "attempting insertion";

		if(mysqli_stmt_execute($stmt1) == false){
			echo 'First query failed: ' . $link->error();
		}
		$stmt1->close();
		if(mysqli_stmt_execute($stmt2) == false){
			echo 'Second query failed: ' . $link->error();
		}

		$stmt2->close();
		
		$link->commit();
		$link->close();
	
        }else{
        	if($_POST['visited-reg-form'] == 1){
        		header('Location: ../user-registration-error.php');
        	}else{
        		header('Location: ../index.php');
        	}
        	
        	
        }
?>
