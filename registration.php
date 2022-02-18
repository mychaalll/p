<?php

  session_start();

  include("connection.php");
  include("functions.php");

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    //something was posted
    $first_name = $_POST['regi_first_name'];
    $middle_name = $_POST['regi_middle_name'];
    $last_name = $_POST['regi_last_name'];
    $email = $_POST['regi_email'];
    $phone_number = $_POST['regi_phone_number'];
    $username = $_POST['regi_username'];
    $password = $_POST['regi_password'];
    $gender = $_POST['regi_gender'];

    //check if variables arent empty
    if(!empty($first_name) && !empty($middle_name) && !empty($last_name) && !empty($email) && !empty($phone_number) && !empty($username) && !empty($password) && !empty($gender))
    {

      //save to database;
      $query = "insert into users (FirstName,MiddleName,LastName,Email,PhoneNumber,Gender,UserName,Password) values ('$first_name','$middle_name','$last_name','$email','$phone_number','$gender','$username','$password')";

      mysqli_query($con, $query);
      header("Location: index.php");
      die;
      
    }
    else
    {
      echo("incomplete details");
    }
  }
?>



<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="registrationStyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <img src="images/logo.png" class="logo">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#" method = "POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name = "regi_first_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" name = "regi_middle_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" name = "regi_last_name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name = "regi_email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" name = "regi_phone_number" placeholder="Enter your phone number" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name = "regi_username" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" name = "regi_password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="text" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="regi_gender" value = "Male" id="dot-1">
          <input type="radio" name="regi_gender" value = "Female" id="dot-2">
          <input type="radio" name="regi_gender" value = "Prefer not to say" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>


</html>
