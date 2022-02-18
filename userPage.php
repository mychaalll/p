<?php
    session_start();

    include("functions.php");
    include("connection.php");

    $userdata = check_login($con);
    echo "Welcome" . $userdata['ID'] . " " . $userdata['FirstName'] . " " . $userdata['LastName'];
    echo(" ");
    echo(" ");

    $userID = $userdata['ID'];


?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            User Page
        </title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width-device-width, initial-scale">
        <!-- <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> -->
        <link rel = "stylesheet" type = "text/css" href = "userStyle.css">
        <script src = "script.js"></script>
    </head>
    <body>
        <section>
            <input type="checkbox" id="check">
            <!-- header -->
            <header>
                <h2>
                    <a href = "#" class = "logo">BloodLife</a>
                </h2>
                <!-- buttons at top right -->
                <div class = "navigation">
                    <a href = "#" onclick="showPage('profilePage','bloodDonorPage','bloodNeederPage')">Profile</a>
                    <a href = "#" onclick="showPage('bloodDonorPage','profilePage','bloodNeederPage')">Show Blood Donors</a>
                    <a href = "#" onclick="showPage('bloodNeederPage','profilePage','bloodDonorPage')">Show Blood Needers</a>
                    <a href = "#" onclick="showPage('login')">Logout</a>
                </div>
                <label for="check">
                    <i class="fa fa-bars menu-btn"></i>
                    <i class="fa fa-times close-btn"></i>
                </label>
            </header>
            <div class = "content" id = "content">
                <!-- profile form -->
                <div class = "profilePage" id = "profilePage">
                    <h1>Profile</h1><br>
                    <!-- container for profile -->
                    <div class = "user-container">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i><br>
                        <!-- info container -->
                        <div class = information-container>
                            <span class = "profile-label">Name: </span><span class = "name-span">Robert Aloc</span>
                            <span class = "profile-label">Email: </span><span class = "email-span">jraloc@gmail.com</span>
                            <span class = "profile-label">Phone Number: </span><span class = "pnumber-span">0919177013</span>
                            <span class = "profile-label">Name: </span><span class = "name-span"></span>
                        </div>
                        <a href = "#" class = "editInfo">Edit your Info</a>
                    </div>
                    <!-- container for user donor records -->
                    <div class = "profileDonor-table" id = "profileDonor-table">
                        <h2>Your Donor Entries</h2>
                        <div class = "userTable-container">
                            <table class = "profileTable-donor">
                                <!-- table headers -->
                                <tr>
                                    <th width = "30%">Name</th>
                                    <th width = "15%">Blood Type</th>
                                    <th width = "15%">Full Address</th>
                                    <th width = "25%">City</th>
                                    <th width = "15%">Region</th>
                                    <th width = "15%">Contact Details</th>
                                    <th width = "15%">Comments</th>
                                    <th width = "15%">Actions</th>
                                </tr>
                                <!-- table data -->
                                <?php
                                $query = "SELECT ID,FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments FROM donortable where CreatorID = '$userID' ";
                                $result = mysqli_query($con, $query);
                        
                                //populate data from database
                                if ($result && mysqli_num_rows($result) > 0)
                                {
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
                                        echo "<td>" . $row['BloodType'] . "</td>";
                                        echo "<td>" . $row['FullAddress'] . "</td>";
                                        echo "<td>" . $row['City'] . "</td>";
                                        echo "<td>" . $row['Region'] . "</td>";
                                        echo "<td>" . $row['ContactDetails'] . "</td>";
                                        echo "<td>" . $row['Comments'] . "</td>";
                                        echo "<td>";
                                        echo "<div class = 'table-buttons'>";
                                        echo "<a class = 'table-edit' href = './editBloodDonor.php?id= " .$row['ID'] ."'>Edit</a>";
                                        echo "<a class = 'table-delete' href = '#'>Delete</a>";
                                        echo "</div>";
                                        echo "</td";
                                        echo "</tr>";
                                    }
                                }
                                else
                                {
                                    echo "No Results";
                                }
                                ?>   
                            </table>
                        </div>    
                    </div>
                    <!-- container for user needer entries -->
                    <div class = "profileNeeder-table" id = "profileNeeder-table">
                        <h2>Your Donor Entries</h2>
                        <div class = "userTable-container">
                            <table class = "profileTable-donor">
                                <!-- table headers -->
                                <tr>
                                    <th width = "30%">Name</th>
                                    <th width = "15%">Blood Type Needed</th>
                                    <th width = "15%">Full Address</th>
                                    <th width = "25%">City</th>
                                    <th width = "15%">Region</th>
                                    <th width = "15%">Contact Details</th>
                                    <th width = "15%">Comments</th>
                                </tr>
                                <!-- table data -->
                                <?php
                                $query = "SELECT ID,FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments FROM donortable where CreatorID = '$userID' ";
                                $result = mysqli_query($con, $query);
                        
                                //populate data from database
                                if ($result && mysqli_num_rows($result) > 0)
                                {
                                    while ($row = mysqli_fetch_assoc($result))
                                    {
                                        echo "<tr>";
                                        echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
                                        echo "<td>" . $row['BloodType'] . "</td>";
                                        echo "<td>" . $row['FullAddress'] . "</td>";
                                        echo "<td>" . $row['City'] . "</td>";
                                        echo "<td>" . $row['Region'] . "</td>";
                                        echo "<td>" . $row['ContactDetails'] . "</td>";
                                        echo "<td>" . $row['Comments'] . "</td>";
                                        echo "<td>";
                                        echo "<div class = 'table-buttons'>";
                                        echo "<a class = 'table-edit' href = './editBloodDonor.php?id= " .$row['ID'] ."'>Edit</a>";
                                        echo "<a class = 'table-delete' href = '#'>Delete</a>";
                                        echo "</div>";
                                        echo "</td";
                                        echo "</tr>";
                                    }
                                }
                                else
                                {
                                    echo "No Results";
                                }
                                ?>    
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Donor Page -->
                <div class = "bloodDonorPage" id = "bloodDonorPage" style="display: none;">
                    <!-- compose button -->
                    <a href = "createEntryDonor.php" class = "ComposeEntry">Compose an entry</a>
                    <table class = "donorTable">
                        <!-- table headers -->
                        <tr>
                            <th width = "30%">Name</th>
                            <th width = "15%">Blood Type</th>
                            <th width = "15%">Full Address</th>
                            <th width = "25%">City</th>
                            <th width = "15%">Region</th>
                            <th width = "15%">Contact Details</th>
                            <th width = "15%">Comments</th>
                        </tr>
                        <!-- table data -->
                        <?php
                        
                        $query = "SELECT FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments FROM donortable ";
                        $result = mysqli_query($con, $query);
                        
                        //populate data from database
                        if ($result && mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr><td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td><td>" . $row['BloodType'] . "</td><td>" . $row['FullAddress'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Region'] . "</td><td>" . $row['ContactDetails'] . "</td><td>" . $row['Comments'] . "</td></tr>";

                            }
                        }
                        else
                        {
                            echo "No Results";
                        }
                        ?>
                    </table>
                </div>
                <!-- Needer Page -->
                <div class = "bloodNeederPage" id = "bloodNeederPage" style="display: none;">
                    <!-- compose button -->
                    <a href = "createEntryNeeder.php" class = "ComposeEntry">Compose an entry</a>
                    <table class = "neederTable">
                        <!-- table headers -->
                        <tr>
                            <th width = "10%">Name</th>
                            <th width = "15%">Blood Type Needed</th>
                            <th width = "15%">Full Address</th>
                            <th width = "25%">City</th>
                            <th width = "15%">Region</th>
                            <th width = "15%">Contact Details</th>
                            <th width = "15%">Comments</th>
                        </tr>
                        <!-- table data -->
                        <?php
                        
                        $query = "SELECT FirstName,MiddleName,LastName,BloodNeeded,FullAddress,City,Region,ContactDetails,Comments FROM needertable ";
                        $result = mysqli_query($con, $query);
                        
                        
                        if ($result && mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr><td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td><td>" . $row['BloodNeeded'] . "</td><td>" . $row['FullAddress'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Region'] . "</td><td>" . $row['ContactDetails'] . "</td><td>" . $row['Comments'] . "</td></tr>";

                            }
                        }
                        else
                        {
                            echo "No Results";
                        }
                        ?>    
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>