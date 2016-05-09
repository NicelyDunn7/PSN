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
	if(isset($_POST['connect'])){
		$user1 = $_POST['User_Id1'];
		$user2 = $_POST['User_Id2'];
		
		if(strcmp($user1, $user2) < 0){
			$sql = "INSERT INTO Connections (User_Id1, User_Id2) VALUES ('$user1', '$user2')";
		} else if (strcmp($user1, $user2) > 0){
			$sql = "INSERT INTO Connections (User_Id1, User_Id2) VALUES ('$user2', '$user1')";
		} else{
			break;
		}

		if ($link->query($sql) === TRUE) {
			echo "New record created successfully";
				//header('Location: ' . $_SERVER['HTTP_REFERER']);
			     header('Location: home.php');
		} else {
			echo "Error: " . $sql . "<br>" . $link->error;
		}

		$conn->close();
		
       // header('Location: home.php');


	}

?>