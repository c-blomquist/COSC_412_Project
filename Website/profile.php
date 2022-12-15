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
            <h2 class = "logo"> Spotmy </h2>
        </div>
        <div class=" menu">
            <li> <a href='index.php'><button class = 'loginbtn' style='width:auto;'>Home</button></a></li>
            <?php
                        if(isset($_SESSION["userName"])){
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
        <h1> Input Artist Name:</h1>
        <form action="includes/recommend.inc.php" method="post">
            <input type="text" name="artist" placeholder="Enter Artist...">
            <button type="submit" name="submit">Submit</button>
        </form>
        <?php
        if(isset($_GET["list"])){
            $recommended = explode(",,,", $_GET["list"]);
            echo "Recommended Songs: <br>";
            foreach ($recommended as $value){
                echo "$value <br>";
            }
        }
        if(isset($_GET["list"]) and $_GET["list"] == ""){
            echo "<p>The artist was not found by the Spotify API. Try again.</p>";
        }
        ?>
    </section>
    
</div>   
          
</body>
</html>