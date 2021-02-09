<?php
   require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body background="maxresdefault.jpg">
  
  <div id="main-wrapper">
      <center><h2>Registration Form</h2>
         <img src="imgs/avatar.png" class="avatar"/>
      </center>
  
  
       <form class="myform" action="register.php" method="post">
           <label><b>Username:</br></label>
           <input name="username" type="text" class="inputvalues" placeholder="Type your username" required/></br >
  
           <label><b>Id:</br></label>
           <input name="id" type="text" class="inputvalues" placeholder="Type your id" required/></br >
  
           <label><b>E-mail:</br></label>
           <input name="email" type="text" class="inputvalues" placeholder="Type your e-mail" required/></br >
  
  
           <label><br>Password:</br></label>
           <input name="password" type="password" class="inputvalues" placeholder="Your password" required/>
           <label><br>Confirm Password:</br></label>
           <input name="cpassword" type="password" class="inputvalues" placeholder="Confrim password" required/>
           <input name="submit_btn" type="submit" id="signup_btn" value="Sign Up"/></br>
           <a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
	
       </form>
  
       <?php
           if(isset($_POST['submit_btn']))
	       {
		      //echo '<script type="text/javascript"> alert("Sign Up button clicked")</script>';
	   
	          $username=$_POST['username'];
			  
			  $id=$_POST['id'];
			  
			  $email =$_POST['email'];
			  
	          $password=$_POST['password'];
	          $cpassword=$_POST['cpassword'];
	   
	          if($password==$cpassword)
	          {
		         $query= "select * from userinfo WHERE id='$id'";
		   
		         $query_run = mysqli_query($con,$query);
		   
		          if(mysqli_num_rows($query_run)>0){
			   
			          echo '<script type="text/javascript"> alert("id already exists.. try another id")</script>';
		            }
		         else{
			          $query= "insert into user values('$username','$id','$email','$password')";
			          $query_run= mysqli_query($con,$query);
			   
			   if($query_run){
				    echo '<script type="text/javascript"> alert("User registered.. Go to login page to login")</script>';
				   
			    }
			   else{
				    echo '<script type="text/javascript"> alert("Error!")</script>';
				   
			    }
			   
		    }
		   		   
	    }
	   
	   else{
		      echo '<script type="text/javascript"> alert("Password and Confirm Password does not match")</script>';
		   
	    }
	   
	
	 }
       ?>
  </div>
</body>
</html>