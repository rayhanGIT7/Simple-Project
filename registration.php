<?php
     $err_name="";
     $err_email="";
     $err_number="";
     $err_address="";
     $err_password ="";
     $alard="";
     

     if ($_SERVER['REQUEST_METHOD']=='POST') {
         if(empty($_POST['name'])){
          $err_name="please enter your name !";
         }
         elseif (empty($_POST['email'])) {
           $err_email ="please enter your Email !";
         }
         elseif(empty($_POST['number'])){
          $err_number="please enter your Number !";
        }
         elseif(empty($_POST['address'])){
          $err_address ="please enter your Address !";
      }
      elseif(empty($_POST['Password'])){
          $err_password ="please enter your Password !";
      }
       else{

     $name=$_POST['name'];
     $email=$_POST['email'];
     $number=$_POST['number'];
     $address=$_POST['address'];
     $password=$_POST['Password'];



     $host_name='localhost';
     $user_name ='root';
     $db_password ='';
     $db_name='registration';

     $database_connection = mysqli_connect($host_name,   $user_name ,$db_password, $db_name);

      $email_validation="SELECT * FROM informations WHERE email = '$email'";
     $email_validation_checking= mysqli_query($database_connection, $email_validation);
     if ($email_validation_checking) {

        $insart_query ="INSERT INTO informations( name,email,numbers,address, password) VALUES (
      '$name',' $email','$number','$address','$password')";
        
       if(mysqli_query( $database_connection, $insart_query)) { 
      ?>
      <script>
        alert("successfully");
        window.location.replace("login.php");
      </script>
      <?php   
   }
        
     }
     else{
        $alard="Email Already Exist !";


     }

     
}
}
     
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
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
        <h1>Registration Form</h1>
        <form action="" method="post">
        <span style="color: red"><?php echo $alard; ?></span>
        <p>Enter Your FullName</p>
        <input type="text" name="name" placeholder="Enter your Name">
         <span style="color: red"><?php echo  $err_name; ?></span> 
       
        <p>Enter Your  Email</p>
        <input type="email" name="email" placeholder="Enter your Email">
        <span style="color: red"><?php echo  $err_email; ?></span> 
        <p>Enter Your Phone Number</p>
        <input type="text" name="number" placeholder="Enter your Phone Number">
         <span style="color: red"><?php echo  $err_number; ?></span>
        <p>Enter Your Address</p>
        <input type="text" name="address" placeholder="Enter your Address">
         <span style="color: red"><?php echo  $err_address; ?></span>
        <p>Password</p>
        <input type="Password" name="Password" placeholder="Enter your Password">
        <span style="color: red"><?php echo  $err_password; ?></span>
          <span style="color: red ;"><?php echo  $err_password; ?></span>
       
        <button type="submit">Registration</button>
         <button type="reset">Clear</button>
        </form>
     </div>

  

</body>
</html>

