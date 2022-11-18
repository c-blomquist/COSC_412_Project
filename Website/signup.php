<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset = "UTF-8">
    <title>spotmymusic</title>
    <link rel= "stylesheet"  href = "style.css">
</head>
<body>
    
<div class = "body">
    <div class="navbar">
        <div class = "icon">
            <h2 class = "logo"> Spotmy</h2>
        </div>
        <div class=" menu">
                   
            <li> <a href='index.php'><button class = 'loginbtn' style='width:auto;'>Home</button></a></li>
            <?php
                        if(isset($_SESSION["userName"])){
                            echo "<li> <a href='profile.php'><button class = 'loginbtn' style='width:auto;'>Profile</button></a></li>";
                            echo "<li> <a href='includes/logout.inc.php'><button class = 'loginbtn' style='width:auto;'>Log Out</button></a></li>";

                        }
                        else{
                            echo "<li> <a href='login.php'><button class = 'loginbtn' style='width:auto;'>Login</button></a></li>";
                            echo "<li> <a href='signup.php'><button class = 'loginbtn' style='width:auto;'>Sign Up</button></a></li>";

                        }
                        ?>
        </div>

    </div>
    
    
    <section class="content">
        <h1> Sign Up.</h1>
        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="username" placeholder="Enter Username...">
            <input type="text" name="email" placeholder="Enter email...">
            <input type="password" name="password" placeholder="Enter password...">
            <input type="password" name="repeatpass" placeholder="Repeat password...">
            <button type="submit" name="submit">Sign Up</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>You left one of the fields blank!</p>";
            }
            if($_GET["error"] == "invalidUsername"){
                echo "<p>Your username is invalid.</p>";
            }
            if($_GET["error"] == "invalidEmail"){
                echo "<p>Your email is already taken.</p>";
            }
            if($_GET["error"] == "passwordMatch"){
                echo "<p>Your passwords did not match.</p>";
            }
            if($_GET["error"] == "usernameTaken"){
                echo "<p>Your username is already taken.</p>";
            }
            if($_GET["error"] == "sqlFailed"){
                echo "<p>The database failed, try again.</p>";
            }
            if($_GET["error"] == "none"){
                echo "<p>You have registered!</p>";
            }
        }
        ?>
    </section>

</div>       

</body>
</html>
