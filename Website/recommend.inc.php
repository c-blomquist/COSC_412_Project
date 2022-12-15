<?php

if(isset($_POST["submit"])){
        
    $artist = "\"" . $_POST["artist"] . "\"";


    $command = escapeshellcmd('python ../recommend.py');
    $command = $command . " -i '" . $artist . "'";
    $output = shell_exec($command);
    header("location: ../profile.php?list=$output");
    exit();

}
else{
    header("location: ../profile.php");
    exit();
}