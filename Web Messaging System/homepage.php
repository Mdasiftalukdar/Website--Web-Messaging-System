<?php
   session_start();
   require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body  background="maxresdefault.jpg" >

  <div id="main-wrapper">
  <center>
  <h2>Home Page</h2>
  <h3><b><p><font size="8" face="verdana" color="green">Welcome</font></p> <b>
  <?php
  $id=$_SESSION['id'];
  $query="select * from userinfo WHERE id=$id ";


    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
	{
   $row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);

echo "<font size='10' face='Arial' color='red'>{$row['username']}</font>";
echo "<br><br>  Your Id:   ";

echo $row['id'];
echo "<br><br> Your Email:  ";

echo $row['email'];

	}
  ?>
  </h3>
  <img src="imgs/avatar.png" class="avatar"/>
  </center>


  <form class="myform" action="homepage.php" method="post">
  <input name=Compose type="submit" id="compose" value="Compose Message"/>

  <input name=Send type="submit" id="send" value="Sent Messages"/>
   <input name=Received type="submit" id="received" value="Received Messages"/>

  <input name=logout type="submit" id="logout_btn" value="Log Out"/></br>

  </form>


  <?php
   if(isset($_POST['Compose'])){
     $_SESSION['userid']=$id;
		echo("<script>window.location.href = 'compose.php' </script>");
   }
    if(isset($_POST['Send'])){
     $_SESSION['userid']=$id;
		echo("<script>window.location.href = 'Sent_msg.php' </script>");
   }
   if(isset($_POST['Received'])){
     $_SESSION['userid']=$id;
		echo("<script>window.location.href = 'Received_msg.php' </script>");
   }

     if(isset($_POST['logout'])){
     session_destroy();
		header('location:index.php');
   }
  ?>
  </div>
</body>
</html>
