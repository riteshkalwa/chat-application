<?php
session_start();
$_SESSION['fullname']=$fullname=$_POST['fullname'];
$_SESSION['username']=$username=$_POST['username'];
$password=$_POST['userpassword'];
$_SESSION['email']=$email=$_POST['usermail'];
$conn=new mysqli('localhost','root','','ritesh');
$stmt=$conn->prepare("insert into users (name,username,password,email) values (?,?,?,?)");
$stmt->bind_param("ssss",$fullname,$username,$password,$email);
$stmt->execute();
header('location:home.php');
?>
    
