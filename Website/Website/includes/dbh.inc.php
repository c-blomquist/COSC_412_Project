<?php

$serverName="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="cosc412";

$connection = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
if(!$connection){
    die("Connection Failed. This is the error encountered: " . mysqli_connect_error());
}