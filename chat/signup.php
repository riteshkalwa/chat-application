<?php
session_start();
if(isset($_SESSION['imagefailure']))
    if($_SESSION['imagefailure']==1)
        echo '<script>alert("Problem with image")</script>';
?>
<html>
<head>
<title>Chat Application</title>
<style>
    table,td,tr{
        position:relative;
        border-collapse: collapse;
        width:280px;
        top:100px;
        left:250px;
     }
    #one{
      position: relative;
      font-family: sans-serif;
      font-size: 24px;
      font-weight: 300;
      font-style: normal;
      color:white;
      text-align: center;
      top:30px;
          
    }
    body{
        background-image:url("chat.jpg");
        background-repeat: no-repeat;
        background-color:grey;
        background-position: left;
    }
    #two{
        position: relative;
        float:right;
        right:0px;
        width:200px;
        max-width:200px;
        top:170px;
        font-family: fantasy;
        font-size: 35px;
        font-variant: small-caps;
    }
    #three{
        position:absolute;
        bottom:0px;
        left:600px;
    }
    tr{
        padding:5px;
        margin:2px;
       
    }
    td{
      padding:5px;   
    }
</style>    
</head>
<body>
<div id="one">Welcome to chat Application Where U Can Express Yourself</div>
<p id="two">Meet all your friends online and have a great time with them</p>    
<form action="userinsert.php" method="post" enctype="multipart/form-data">
<table>    
<tr>
<td>Name:</td>    
    <td><input type="text" name="fullname" id="fullname" autocomplete="off"></td>    
</tr>
<tr>
<td>UserName:</td>
    <td><input type="text" name="username" id="username" autocomplete="off"></td>
</tr> 
<tr>
<td>Password:</td>
    <td><input type="password" name="userpassword" id="userpassword" autocomplete="off"></td>
</tr>
<tr>
<td>Email:</td>
    <td><input type="email" name="usermail" id="usermail" autocomplete="off"></td>
</tr> 
<tr>
<td><input type="submit"></td>
<td><input type="reset"></td>    
</tr>    
</table>
</form>
<p id="three">copy right:Ritesh Kumar</p>    
</body>    
</html>