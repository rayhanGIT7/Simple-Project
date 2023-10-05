<?php 

   
     $host_name='localhost';
     $user_name ='root';
     $db_password ='';
     $db_name='registration';

     $database_connection = mysqli_connect($host_name,   $user_name ,$db_password, $db_name);

     
     
     $error ="";
      


   if ($_SERVER['REQUEST_METHOD']=='POST') {
     	$email=$_POST['email'];
			$password =$_POST['Password'];



			$checking_query ="SELECT count(*) AS ray FROM informations WHERE email ='$email' AND password = '$password'";
			$result = mysqli_query($database_connection,$checking_query);
			$after_assoc = mysqli_fetch_assoc($result);

			if ($after_assoc ['ray']>0) {
      
			header("location:doctor_list.php");  
			}
			else{
			$error="Your Email Or password Invalid !";
				
 }
			
   
}

   
?>			





<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	 <link rel="stylesheet" type="text/css" href="navigation.css">
</head>
<body>
	   <div class="nav">
        <label class="logo">Doctor's Appointment System</label>
      
        <ul>
          
        <li><a href="home_page.php">Home</a></li>
        <li><a href="About.html">About</a></li>  
        <li><a href="doctor.html">Doctor's</a></li>   
        <li><a href="registration.php">Registration</a></li>   
        <li><a href="login.php">Login</a></li>   
         <li><a href="online_service.php">OnLine_Services</a></li> 

     </ul>
       </div>
	 <div class="login-form">
	 	<h1>Login Form</h1>
	 	<form action="#" method="post">
	 	
	 	<p>User Email</p>
	 	<input type="email" name="email" placeholder="Enter your Email">
	 	<p>Password</p>
	 	<input type="Password" name="Password" placeholder="Enter your Password">
	 	<span style="color: red;font-weight: bold; font-size: 20px;"> <?php echo $error ;?></span>
	 	<button type="submit">Login</button>
	 	

	 	</form>
	 </div>

</body>
</html>

