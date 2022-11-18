<?php

function emptyInputSignup($username, $email, $password, $repeatpass){
    $result=true;
    if(empty($username) || empty($email) || empty($password) || empty($repeatpass)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidUsername($username){
    $result=true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function invalidEmail($email){
    $result=true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function passwordMatch($password, $repeatpass){
    $result=true;
    if($password !== $repeatpass){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function usernameExists($connection, $username, $email){
    $sql ="SELECT * FROM users WHERE username = ? OR usersEmail = ?;";
    $statement = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=sqlFailed");
        exit();
    }

    mysqli_stmt_bind_param($statement, "ss", $username, $email);
    mysqli_stmt_execute($statement);

    $dataResult = mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($dataResult)){
        mysqli_stmt_close($statement);
        return $row;
    }
    else{
        $result = false;
        mysqli_stmt_close($statement);
        return $result;
    }

}

function createUser($connection, $username, $email, $password){
    $sql ="INSERT INTO users (username, usersEmail, usersPassword) VALUES (?, ?, ?);";
    $statement = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($statement, $sql)){
        header("location: ../signup.php?error=sqlFailed");
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "sss", $username, $email, $hashedPassword);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);

    header("location: ../signup.php?error=none");
    exit();

}

//functions for login
function emptyInputLogin($username, $password){
    $result=true;
    if(empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result=false;
    }
    return $result;
}

function loginUser($connection, $username, $password){
    $usernameExists = usernameExists($connection, $username, $username);
    if($username === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    
    $passwordHashed = $usernameExists["usersPassword"];
    $checkPassword = password_verify($password, $passwordHashed);

    if($checkPassword === false){
        header("location: ../login.php?error=wrongpass");
        exit();
    }
    else if($checkPassword === true){
        session_start();
        $_SESSION["userID"] = $usernameExists["usersID"];
        $_SESSION["userName"] = $usernameExists["username"]; 
        header("location: ../index.php");
        exit();
    }
}