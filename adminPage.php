<?php
    session_start();
    include("connection.php");
    include("functions.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Page
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
                    <a href = "#" onclick="showAdmin('dashboard','userPage','bloodDonorPage','bloodNeederPage')">Profile</a>
                    <a href = "#" onclick="showAdmin('userPage','dashboard','bloodDonorPage','bloodNeederPage')">Show Users</a>
                    <a href = "#" onclick="showAdmin('bloodDonorPage','dashboard','userPage','bloodNeederPage')">Show Blood Donors</a>
                    <a href = "#" onclick="showAdmin('bloodNeederPage','dashboard','userPage','bloodDonorPage')">Show Blood Needers</a>
                    <a href = "index.php">Logout</a>
                </div>
                <label for="check">
                    <i class="fa fa-bars menu-btn"></i>
                    <i class="fa fa-times close-btn"></i>
                </label>
            </header>
            <div class = "content" id = "content">
                <!-- admin form -->
                <div class = "dashboard" id = "dashboard">
                    <h1>Dashboard</h1><br>
                    <!-- container for user donor records -->
                    <div class = "profileDonor-table" id = "profileDonor-table">
                        <h2>Your Donor Entries</h2>
                        <div class = "userTable-container">
                            <table class = "profileTable-donor">
                                <!-- table headers -->
                                <tr>
                                    <th width = "10%">Name</th>
                                    <th width = "15%">Blood Type</th>
                                    <th width = "15%">Full Address</th>
                                    <th width = "25%">City</th>
                                    <th width = "15%">Region</th>
                                    <th width = "15%">Contact Details</th>
                                    <th width = "15%">Comments</th>
                                </tr>
                                <!-- table data -->
                                <tr>
                                    <td width = "10%">Mychal Esureña</th>
                                    <td width = "15%">A</th>
                                    <td width = "15%">Blk. 5 Antique</th>
                                    <td width = "25%">Quezon City</th>
                                    <td width = "15%">NCR</th>
                                    <th width = "15%">09194550572</th>
                                    <td width = "15%">none</th>
                                </tr>    
                            </table>
                        </div>
                        <!-- container for user needer entries -->
                        <div class = "profileNeeder-table" id = "profileNeeder-table">
                            <h2>Your Donor Entries</h2>
                            <div class = "userTable-container">
                                <table class = "profileTable-donor">
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
                                    <tr>
                                        <td width = "10%">Kitagawa Marin</th>
                                        <td width = "15%">0+</th>
                                        <td width = "15%">Blk. 5 Antique</th>
                                        <td width = "25%">Quezon City</th>
                                        <td width = "15%">NCR</th>
                                        <th width = "15%">09194550572</th>
                                        <td width = "15%">willing to pay, urgent</th>
                                    </tr>    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- user page -->
                <div class = "userPage" id = "userPage" style="display: none;">
                    <!-- compose button -->
                    <a href = "#" class = "ComposeEntry">Compose an entry</a>
                    <table class = "donorTable">
                        <!-- table headers -->
                        <tr>
                            <th width = "10%">ID</th>
                            <th width = "30%">Name</th>
                            <th width = "15%">Email</th>
                            <th width = "15%">Phone Number</th>
                            <th width = "25%">Gender</th>
                            <th width = "15%">Username</th>
                            <th width = "15%">Password</th>
                        </tr>
                        <!-- table data -->
                        <?php
                        $query = "SELECT ID,FirstName,MiddleName,LastName,Email,PhoneNumber,Gender,Username,Password FROM users ";
                        $result = mysqli_query($con, $query);
                    
                        //populate data from database
                        if ($result && mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['ID'] . "</td>";
                                echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
                                echo "<td>" . $row['Email'] . "</td>";
                                echo "<td>" . $row['PhoneNumber'] . "</td>";
                                echo "<td>" . $row['Gender'] . "</td>";
                                echo "<td>" . $row['Username'] . "</td>";
                                echo "<td>" . $row['Password'] . "</td>";
                                echo "<td>";
                                echo "<div class = 'table-buttons'>";
                                echo "<a class = 'table-edit' href = './editUser.php?id= " .$row['ID'] ."'>Edit</a>";
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
                <!-- Donor Page -->
                <div class = "bloodDonorPage" id = "bloodDonorPage" style="display: none;">
                    <!-- compose button -->
                    <a href = "#" class = "ComposeEntry">Compose an entry</a>
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
                        $query = "SELECT ID,FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments FROM donortable ";
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
                <!-- Needer Page -->
                <div class = "bloodNeederPage" id = "bloodNeederPage" style="display: none;">
                    <!-- compose button -->
                    <a href = "#" class = "ComposeEntry">Compose an entry</a>
                    <table class = "neederTable">
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
                        $query = "SELECT ID,FirstName,MiddleName,LastName,BloodNeeded,FullAddress,City,Region,ContactDetails,Comments FROM needertable ";
                        $result = mysqli_query($con, $query);
                
                        //populate data from database
                        if ($result && mysqli_num_rows($result) > 0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['LastName'] . "</td>";
                                echo "<td>" . $row['BloodNeeded'] . "</td>";
                                echo "<td>" . $row['FullAddress'] . "</td>";
                                echo "<td>" . $row['City'] . "</td>";
                                echo "<td>" . $row['Region'] . "</td>";
                                echo "<td>" . $row['ContactDetails'] . "</td>";
                                echo "<td>" . $row['Comments'] . "</td>";
                                echo "<td>";
                                echo "<div class = 'table-buttons'>";
                                echo "<a class = 'table-edit' href = './editBloodNeeder.php?id= " .$row['ID'] ."'>Edit</a>";
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
        </section>
</html>