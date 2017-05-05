<?php
session_start();
 $conn=new mysqli('localhost','root','','ritesh');
 $sql="select * from users where username='".$_POST['username']."' and password='".$_POST['userpassword']."'";
 $result=$conn->query($sql);
 if($result->num_rows>0){
     $row=$result->fetch_assoc();
     $_SESSION['fullname']=$row['name'];
     $_SESSION['username']=$row['username'];
     $_SESSION['email']=$row['email'];
     header('location:home.php');
 }
 else{
     $_SESSION['loginfailure']=1;
     header('location:login.php');
 }
?>