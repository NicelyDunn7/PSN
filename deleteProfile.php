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
	global $link;
	if($_SESSION['type'] == 'user') {
		$sql = "DELETE FROM Messages WHERE Sender = '{$_SESSION['user_id']}' OR Recipient = '{$_SESSION['user_id']}';";
		$sql2 = "DELETE FROM Connections WHERE User_Id1 = '{$_SESSION['user_id']}' OR User_Id2 = '{$_SESSION['user_id']}';";
		$sql3 = "DELETE FROM User WHERE User_Id = '{$_SESSION['user_id']}';";
		$sql4 = "DELETE FROM UserCredentials WHERE UserCredential_Id = '{$_SESSION['user_id']}';";
		/*$stmt = mysqli_prepare($link, $sql);
		$stmt2 = mysqli_prepare($link, $sql2);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_execute($stmt2);*/
		$link->query($sql);
		$link->query($sql2);
		$link->query($sql3);
		$link->query($sql4);
		header("Location: controllers/logout-controller.php");
	}
	if($_SESSION['type'] == 'business') {
		$sql = "DELETE FROM Businesses WHERE Bus_Id = '{$_SESSION['bus_id']}'";
		$sql2 = "DELETE FROM BusinessCredentials WHERE BusinessCredential_Id = '{$_SESSION['bus_id']}'";
		$stmt = mysqli_prepare($link, $sql);
		$stmt2 = mysqli_prepare($link, $sql2);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_execute($stmt2);
		header("Location: controllers/logout-controller.php");
	}
?>