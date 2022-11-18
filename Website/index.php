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
            <div class="search-box">
                <div class="search">
                    <input class ="srch" type="search" name=" " placeholder=" Type To Text">
                    <a href="#"> <button class="btn" >Search</button></a>
        
                </div>
        
                <div class="content"> 
                <h1>Start listening for free with ads <br> Get premium for only $3.99/month. </h1>

            </div>
            </div> 
          

</body>
</html>
