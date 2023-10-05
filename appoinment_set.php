
<?php
     $err_name="";
     $err_date="";
     $err_number="";
    
     $alard="";
     

     if ($_SERVER['REQUEST_METHOD']=='POST') {
         if(empty($_POST['name'])){
          $err_name="please enter your name !";
         }
         elseif (empty($_POST['date'])) {
           $err_email ="please enter date !";
         }
         elseif(empty($_POST['number'])){
          $err_number="please enter your Number !";
        }
         
       else{

     $name=$_POST['name'];
     $date=$_POST['date'];
     $number=$_POST['number'];
    



     $host_name='localhost';
     $user_name ='root';
     $db_password ='';
     $db_name='student';

     $database_connection = mysqli_connect($host_name,   $user_name ,$db_password, $db_name);
     

    

        $insart_query ="INSERT INTO appointments( name,dates,numbers) VALUES ('$name',' $date','$number')";
        
       if(mysqli_query( $database_connection, $insart_query)){  
      ?>
      <script>
        alert("successfully");
        window.location.replace("doctor_list.php");
      </script>
      <?php   
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
  <title>Appoinment_set</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="appoinment.css">
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
  <div>


  <div class="container">
    <div class="contact-box">
      <div class="left"></div>
      <div class="right">
        <h2>Set Appoinment</h2>
        <form action="" method="post">
        <input type="text" name="name" class="field" placeholder="Patient Name">
         <span style="color: red"><?php echo  $err_name; ?></span> 
       
        <input type="date"name="date" class="field" placeholder="Appoinment Date">
         <span style="color: red"><?php echo  $err_date; ?></span> 
       
        <input type="text" name="number" class="field" placeholder="Phone Number">
         <span style="color: red"><?php echo  $err_number; ?></span> 
       
        
        
        <button class="btn" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>