<?php
  session_start();
   require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body  background="maxresdefault.jpg" >

  <div id="main-wrapper">
  <center><h2>login Form</h2>
  <img src="imgs/avatar.png" class="avatar"/>
  </center>


  <form class="myform" action="index.php" method="post">
  <label><br><b>Id:</b></br></label>
  <input name="id" type="text" class="inputvalues" placeholder="Type your id" />
  <label><br><b>Password:</b></br></label>
  <input name="password" type="password" class="inputvalues" placeholder="Type your password"/>
  <input name="login" type="submit" id="login_btn" value="Login"/></br>
  <a href="register.php"><input type="button" id="register_btn" value="Register"/></a>
  </form>

  <?php
  if(isset($_POST['login']))
  {
	$id=$_POST['id'];
    $password=$_POST['password'];


    $query="select * from userinfo WHERE id='$id' AND password='$password'";

    $query_run = mysqli_query($con,$query);
    if(mysqli_num_rows($query_run)>0)
	{
		$_SESSION['id']=$id;
		echo("<script>window.location.href = 'homepage.php' </script>");

	}
	else
	{

		echo '<script type="text/javascript"> alert("Invalid credentials")</script>';
	}

  }

  ?>


  </div>
</body>
</html>
