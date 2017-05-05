<?php
session_start();
if(isset($_SESSION['loginfailure'])){
    if($_SESSION['loginfailure']==1)
       echo '<script>alert("Invalid Deatils")</script>';
    unset($_SESSION['loginfailure']);
 }
?>
<html>
<head>
<style>
    table{
        position: relative;
        top:200px;
        left:530px;
    }
    body{
        background-color:gray;
    }
    #detail{
        color:white;
    }
</style>
</head>
<body>
<form method="post" action="validate.php" >
<table>
<tr>
<td id="detail">UserName</td>    
<td><input type="text" name="username" id="username" ></td>
</tr>    
<tr>
<td id="detail">Password</td>
<td><input type="password" name="userpassword" id="userpassword" ></td>
</tr>
<tr>    
    <td><input type="submit" value="Login" ></td>
    <td><input type="reset" value="Reset"></td>
</tr>
</table>    
</form>
</body>
</html>