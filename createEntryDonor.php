<?php
    session_start();

    include("functions.php");
    include("connection.php");

    $userdata = check_login($con);
    echo "Welcome" . $userdata['ID'] . " " . $userdata['FirstName'] . " " . $userdata['LastName'];
    echo(" ");
    echo(" ");

    $userID = $userdata['ID'];
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //something was posted
      $first_name = $_POST['entry-first-name'];
      $middle_name = $_POST['entry-middle-name'];
      $last_name = $_POST['entry-last-name'];
      $blood_type = $_POST['entry-blood-type'];
      $full_address = $_POST['entry-full-address'];
      $city = $_POST['entry-city'];
      $region = $_POST['entry-region'];
      $contact_details = $_POST['entry-contact-details'];
      $comments = $_POST['entry-comments'];

      //check if variables arent empty
      if(!empty($first_name) && !empty($middle_name) && !empty($last_name) && !empty($blood_type) && !empty($full_address) && !empty($city) && !empty($region) && !empty($contact_details) && !empty($comments))
      {

        //save to database;
        $query = "INSERT into donortable (CreatorID,FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments) values ('$userID','$first_name','$middle_name','$last_name','$blood_type','$full_address','$city','$region','$contact_details','$comments')";

        mysqli_query($con, $query);
        header("Location: userPage.php");
        die;
        
      }
      else
      {
        echo("incomplete details");
      }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Donor Entry</title>
    <link rel="stylesheet" href="registrationStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <img src="images/logo.png" class="logo">
    <div class="title">Blood Donor Entry Form</div>
    <div class="content">
      <form method = "POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" class = "first-name" name = "entry-first-name" placeholder="Enter First name" required>
          </div>
          <div class="input-box">
            <span class="details">Middle Name</span>
            <input type="text" class = "middle-name" name = "entry-middle-name" placeholder="Enter Middle name. Write N/A if not applicable" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" class = "last-name" name = "entry-last-name" placeholder="Enter Last name" required>
          </div>
          <div class="input-box">
            <span class="details">Blood Type</span>
            <select class = "choiceList" name = "entry-blood-type">
                <option disabled = "disabled">Choose a Blood Type</option>
                <option value = "A+">A+</option>
                <option value = "O+">O+</option>
                <option value = "B+">B+</option>
                <option value = "AB-">AB-</option>
                <option value = "A-">A-</option>
                <option value = "O-">O-</option>
                <option value = "B-">B-</option>
                <option value = "AB-">AB-</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Full Address</span>
            <input type="text" name = "entry-full-address" placeholder="Enter your Full Address" required>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" name = "entry-city" placeholder="Enter City" required>
          </div>
          <div class="input-box">
            <span class="details">Region</span>
            <select class = "choiceList" name = "entry-region">
                <option disabled = "disabled">Choose a Region</option>
                <option value = "NCR">NCR (National Capital Region)</option>
                <option value = "CAR">CAR (Cordillera Administrative Region)</option>
                <option value = "BARMM">BARMM (Bangsamoro)</option>
                <option value = "Region I">Region I (Ilocos Region)</option>
                <option value = "Region II">Region II (Cagayan Valley)</option>
                <option value = "Region III">Region III (Central Luzon)</option>
                <option value = "Region IV-A">Region IV-A (CALABARZON)</option>
                <option value = "Region IV-B">Region IV-B (MIMAROPA)</option>
                <option value = "Region V">Region V (Bicol Region)</option>
                <option value = "Region VI">Region VI (Western VIsayas)</option>
                <option value = "Region VII">Region VII (Central VIsayas)</option>
                <option value = "Region VIII">Region VIII (Eastern VIsayas)</option>
                <option value = "Region IX">Region IX (Zamboanga Peninsula)</option>
                <option value = "Region X">Region X (Northern Mindanao)</option>
                <option value = "Region XI">Region XI (Davao Region)</option>
                <option value = "Region XII">Region XII (Soccsksargen)</option>
                <option value = "Region XIII">Region XII (CARAGA)</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Contact Details</span>
            <textarea class = "comments" name = "entry-contact-details" placeholder = "Add Contact Details here." rows = "10" cols = "30" ></textarea>
          </div>
          <div class="input-box">
            <span class="details">Comments</span>
            <textarea class = "comments" name = "entry-comments" placeholder = "Add Comments here" rows = "10" cols = "30" ></textarea>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit Entry">
        </div>
      </form>
    </div>
  </div>

</body>
</html>