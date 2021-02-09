<?php
  session_start();
   require 'dbconfig/config.php'
?>
<!DOCTYPE html>
<html>
<head>
<title>Compose Message</title>
<link rel="stylesheet" href="css/style.css">
<?php
   $userid=$_SESSION['userid'];
   echo $userid;
  ?>
</head>
<body background="maxresdefault.jpg">
  
  <div id="main-wrapper">
  </center>
  
  
  <form class="myform" action="compose.php" method="post">
  <label><br><b>To(id):</b></br></label>
  <input name="id" type="text" class="inputvalues" placeholder="Type reciever's id" />
  <label><br><b>Message:</b></br></label>
  <input name="message" type="text" class="inputvalues" placeholder="Type your message"/>
  <input name="send" type="submit" id="send" value="Send"/></br>
   <a href="homepage.php"><input type="button" id="back_btn" value="Back"/></a>
 
  </form>
  
  <?php
           if(isset($_POST['send']))
	       {
		    
	     $R_id=$_POST['id'];
		 $msg=$_POST['message'];
	   
	          
		         //$query= "select * from userinfo WHERE id='$R_id'";
		   
		         //$query_run = mysqli_query($con,$query);
		   
		          //if(mysqli_num_rows($query_run)>0){
					  $query= "insert into msg values('$userid','$msg','$R_id')";
			          $query_run= mysqli_query($con,$query);
			   
			   if($query_run){
				    echo '<script type="text/javascript"> alert("Message send")</script>';
				   
			    }
			   else{
				    echo '<script type="text/javascript"> alert("Error!")</script>';
				   
			    }
			   
			   
				  }
				  
				  
			   // else{
			          
			   //echo '<script type="text/javascript"> alert("Recipient id does not exists.. try another id")</script>';
			          
		         //   }
					
					
		        
		    
		   		   
	    
	   
	
	   
	
	 
       ?>
  
  
  </div>
</body>
</html>