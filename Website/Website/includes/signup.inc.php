<?php
//if the user got here through actually using the sign up button
if(isset($_POST["submit"])){
    
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeatpass = $_POST["repeatpass"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    //checking possible errors that a user could do
    if(emptyInputSignup($username, $email, $password, $repeatpass) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if(invalidUsername($username) !== false){
        header("location: ../signup.php?error=invalidUsername");
        exit();
    }
    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if(passwordMatch($password, $repeatpass) !== false){
        header("location: ../signup.php?error=passwordMatch");
        exit();
    }
    if(usernameExists($connection, $username, $email) !== false){
        header("location: ../signup.php?error=usernameTaken");
        exit();
    }


    createUser($connection, $username, $email, $password);

}
else{
    header("location: ../signup.php");
}