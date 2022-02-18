<?php

    session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        if(!empty($username) && !empty($password))
        {
            if($username == "admin" && $password == "admin123")
            {
                header("Location:adminPage.php");
            }
            $query = "select * from users where UserName = '$username' limit 1";

            $result = mysqli_query($con, $query);

            if ($result && mysqli_num_rows($result) > 0)
            {
                $user_data =  mysqli_fetch_assoc($result);
                
                if($user_data['Password'] === $password)
                {
                    $_SESSION['ID'] = $user_data['ID'];
                    header("Location: userPage.php");
                    die;
                }
                else
                {
                    echo("wrong password");
                }
            }
            else
            {
                echo("no user found");
            }
        }
        else
        {
            echo("incomplete details");
        }

    }

?>


<!DOCTYPE html>
<html lang = "en" dir = "ltr">
    <head>
        <title>
            Front Page
        </title>
        <meta charset = "utf-8">
        <meta name = "viewport" content = "width-device-width, initial-scale">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <link rel = "stylesheet" type = "text/css" href = "style.css">
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
                <div class = "navigation">
                    <a href = "#" onclick="showPageHome('home','about','contact','login','moreInfo')">Home</a>
                    <a href = "#" onclick="showPageHome('about','home','contact','login','moreInfo')">About</a>
                    <a href = "#" onclick="showPageHome('contact','home','about','login','moreInfo')">Contact Us</a>
                    <a href = "#" onclick="showPageHome('login','home','about','contact','moreInfo')">Save a Life Now!</a>
                </div>
                <label for="check">
                    <i class="fa fa-bars menu-btn"></i>
                    <i class="fa fa-times close-btn"></i>
                </label>
            </header>
            <div class = "content" id = "content">
                <!-- info form -->
                <div class = "info" id = "home">
                    <h2>Donate Blood.<br><span>Donate Life.</span></h2>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur excepturi id magni vel quod et beatae, eligendi, in nobis ipsa est quisquam molestias deleniti nemo vitae dolorem inventore autem illum.</p>
                    <a href = "#" class = "info-btn" onclick="showPageHome('moreInfo','home','about','contact','login')">More Info</a>
                </div>
                <!-- more info -->
                <div class = "moreInfo" id = "moreInfo" style="display: none;">
                <br>
                <br>
                    wiwiw
                </div>
                <!-- about form -->
                <div class = "about" id = "about" style = "display: none;">
                    <img src = "bg.jpg">
                    Blood dadasdasd
                </div>
                <!-- contact form -->
                <div class = "contact" id = "contact" style = "display: none;">
                    <<img src = "bg.jpg">
                    eto yung contact form dapat>
                </div>
                <!-- login form -->
                <div class = "login" id = "login" style = "display: none;">
                    <h1>Login Here</h1>
                    <form action = "#" method="POST">
                        <p>Username</p>
                        <input type="text" id = "username" name = "login_username" placeholder="Enter Username" required>
                        <P>Password</P>
                        <input type="password" id = "password" name = "login_password" placeholder="Enter Password" required>
                        <input type="submit" id = "loginButton" name = "" onclick = "showHomePage('login','home','about','contact','moreInfo')" value= "Login">
                    </form>
                        
                    <a href="registration.php"> Dont have an account?</a> 
                </div>
            </div>
             <!--footer-->
            <div class = "media-icons">
                <a href = "#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href = "#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href = "#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            
        </section>
    </body>
</html>