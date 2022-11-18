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
                            echo "<li> <a href='login.php'><button class = 'loginbtn' style='width:auto;'>Log In</button></a></li>";
                            echo "<li> <a href='signup.php'><button class = 'loginbtn' style='width:auto;'>Sign Up</button></a></li>";

                        }
                        ?>

        </div>
    </div>
    <section class="content">
        <h1> Log in.</h1>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="username" placeholder="Enter Username/Email...">
            <input type="password" name="password" placeholder="Enter password...">
            <button type="submit" name="submit">Log in</button>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>You left one of the fields blank!</p>";
            }
            if($_GET["error"] == "wronglogin"){
                echo "<p>Username does not exist.</p>";
            }
            if($_GET["error"] == "wrongpass"){
                echo "<p>This is the incorrect password for this username.</p>";
            }
            if($_GET["error"] == "passwordMatch"){
                echo "<p>Your passwords did not match.</p>";
            }
        }
        ?>
    </section>
</div>   
          

</body>
</html>
