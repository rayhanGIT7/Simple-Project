<?php
$err_name = "";
$err_email = "";
$err_number = "";
$err_address = "";
$err_password = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($_POST['name'])) {
    $err_name = "please enter your name !";
  } elseif (empty($_POST['email'])) {
    $err_email = "please enter your Email !";
  } elseif (empty($_POST['number'])) {
    $err_number = "please enter your Number !";
  } elseif (empty($_POST['address'])) {
    $err_pass = "please enter your Address !";
  } elseif (empty($_POST['password'])) {
    $err_pass = "please enter your Password !";
  } else {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $password = $_POST['Password'];

    $host_name = 'localhost';
    $user_name = 'root';
    $db_password = '';
    $db_name = 'student';

    $database_connection = mysqli_connect($host_name,   $user_name, $db_password, $db_name);

    $email_validation = "SELECT * FROM informations WHERE email = '$email'";
    $email_validation_checking = mysqli_query($database_connection, $email_validation);
    if (!$email_validation_checking) {

      $insart_query = "INSERT INTO informations( name,email,numbers,address, Password) VALUES (
      '$name',' $email','$number','$address','$password')";

      if (mysqli_query($database_connection, $insart_query)) {
        echo  '<div class="alert alert-success">
         <strong>Successfull!</strong> 
      </div>';
      }
    } else {
      echo "Email Already Exist";
    }
  }
}
