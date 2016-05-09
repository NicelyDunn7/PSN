 <?php
        //If the user is not connected through HTTPS, redirect into it
        if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
           $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
           header('Location: ' . $url);
        }

        session_start();

        if(strcmp($_SESSION['type'],'user') === 0){
    
        } else if(strcmp($_SESSION['type'], 'business') === 0){
         
        }else{
		  header('Location: index.php');
        }
 
         $uname = $_POST['uname'];
         $msg = $_POST['msg'];
         //$chatname = $_SESSION['user_id'];
         $chatname = $_POST['chatname'];
        include 'controllers/dbcreds.php';
        //$conn = mysql_connect('localhost','root','!HZwwh258369');
         //mysql_select_db('group9web',$conn);
         if($link->connect_error){
           die("Connection failed:".$link->connect_error);
         }
         //$sql = "INSERT INTO Messages (Sender,Recipient,Content) VALUES ('$chatname','$uname','$msg')";
         $sql = "INSERT INTO Messages (Sender,Recipient,Content) VALUES ('$chatname','$uname','$msg')";

         $link->query($sql);
         //echo $uname;
         //echo $_SESSION['user_id'];
         $sql2 = "SELECT * FROM Messages WHERE Sender = '$chatname'";
         $result = $link->query($sql2);

         while($row = $result->fetch_assoc()){

            //print "Me to $row['Recipient']: $row['Content']";
            echo $row['Sender']." : ".$row['Content']."<br>";
            //printf ("%s to %s: %s\n", $row['Sender'],$row['Recipient'], $row['Content']);

    }
?>
