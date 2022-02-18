<!DOCTYPE html>
<html>
    <body>
        <div class = "bloodDonorPage" id = "bloodDonorPage" >
            <!-- compose button -->
            <a href = "createEntryDonor.html" class = "ComposeEntry">Compose an entry</a>
            <table class = "donorTable">
                <!-- table headers -->
                <tr>
                    <th width = "10%">Name</th>
                    <th width = "10%">Name</th>
                    <th width = "10%">Name</th>
                    <th width = "15%">Blood Type</th>
                    <th width = "15%">Full Address</th>
                    <th width = "25%">City</th>
                    <th width = "15%">Region</th>
                    <th width = "15%">Contact Details</th>
                    <th width = "15%">Comments</th>
                    <th width = "10%">Name</th>
                    <th width = "10%">Name</th>
                </tr>
                <!-- table data -->
                <?php
                session_start();
                
                include("connection.php");
                
                $query1 = "SELECT FirstName,MiddleName,LastName,BloodType,FullAddress,City,Region,ContactDetails,Comments FROM donortable ";
                $result1= mysqli_query($con, $query1);
                
                
                if ($result1 && mysqli_num_rows($result1) > 0)
                {
                    while ($row = mysqli_fetch_assoc($result1))
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
    </body>
    <script>
        function validateLogin(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            console.log(username);
            console.log(password);

            if(username == "admin" && password == "123")
            {
                console.log("login successfully");
                return false;
            }
            else 
            {
                console.log("login failed");
            }
        }
    </script>
</html>