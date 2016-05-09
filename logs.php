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

       //global $recipent, $content;
       //$_SESSION['user_id'] = 'Weihan';
        $uname = $_POST['uname'];
        //$msg = $_POST['msg'];
        //$chatname = $_SESSION['user_id'];
        $chatname = $_POST['chatname'];
        //echo $uname;
        //echo $msg;
      //  echo $chatname;
       include 'controllers/dbcreds.php';
       //$conn = mysql_connect('localhost','root','!HZwwh258369');
        //mysql_select_db('group9web',$conn);
        if($link->connect_error){
          die("Connection failed:".$link->connect_error);
        }
        //$sql = "INSERT INTO Messages (Sender,Recipient,Content) VALUES ('$chatname','$uname','$msg')";
      //  $sql = "INSERT INTO Messages (Sender,Content) VALUES ('$chatname','$msg')";

      //  $conn->query($sql);
      //  echo $uname;
        //echo "<br>";
        //echo $chatname;
        //echo "<br>";
        //echo $_SESSION['user_id'];

        //$sql2 = "SELECT * FROM Messages WHERE Sender = '$chatname'";
        $sql2 = "SELECT * FROM Messages WHERE (Sender = '$chatname' and Recipient = '$uname') or (Sender = '$uname' and Recipient = '$chatname')";
        //$sql3 = "SELECT * FROM Messages WHERE Sender = '$uname' and Recipient = '$chatname'";
      //  echo $sql2;
        $result = $link->query($sql2);
        //$result2 = $conn->query($sql3);
        while($row = $result->fetch_assoc()){
           //print "Me to $row['Recipient']: $row['Content']";
           echo $row['Sender']." to ".$row['Recipient'].": ".$row['Content']."<br>";
           //$row2 = $result2->fetch_assoc());
              //print "Me to $row['Recipient']: $row['Content']";
           //echo $row2['Sender']." to ".$row2['Recipient'].": ".$row2['Content']."<br>";

   }
?>
