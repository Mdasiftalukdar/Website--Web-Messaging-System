<?php
   session_start();
   require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Received Messages</title>
<link rel="stylesheet" href="css/style.css">
<?php
   $id=$_SESSION['userid'];
   echo $id;
  ?>
</head>
<body  background="maxresdefault.jpg" >

  <div id="main-wrapper">
  <center>
  <?php

  $query="select * from msg WHERE Recipient_id=$id ";




				    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
	{

      while($row = mysqli_fetch_array($query_run,MYSQLI_ASSOC))
	  {

echo "<br><br>  Message:   ";
echo "<font size='4' color='red'>{$row['Message']}</font>";
echo "<br>  Sent by:  ";
  $id=$row['User_id'] ;

$quer="select * from userinfo WHERE id=$id";
$query_ru = mysqli_query($con,$quer);
$row= mysqli_fetch_array($query_ru,MYSQLI_ASSOC);
echo $row['username'];
echo "<br>";
	}
	}
	 else{
				    echo "<br><b><font size='8' color='blue'>No messages<br></b>";

			    }

  ?>

    <a href="homepage.php"><input type="button" id="back_btn" value="Back"/></a>
  </center>


  </div>
</body>
</html>
