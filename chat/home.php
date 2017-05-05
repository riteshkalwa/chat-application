<?php
session_start();
if(isset($_SESSION['friendfailure'])){
    if($_SESSION['friendfailure']==1)
        echo '<script>alert("Please click on a friend name to send message")</script>';
    unset($_SESSION['friendfailure']);
}
?>
<html>
<head>   
<style>
#leftmenu{
   position:relative;
   float:left;
   top:0px;
   text-align:center;    
   height:630px;
   width:250px;
   border:1px solid black;
   background-color:dimgrey;
   color:white;    
 }
  #friendstable{
        position:absolute;
        top:30px;
        float:left;
  }
  button{
    padding:5px;
    border-top:1px solid red;
    border-bottom:1px solid red;
    color:green;
    font-family:sans-serif;
    font-size:15px;
    background-color:bisque;
    width:250px;  
  }
   #mainmenu{
     position:absolute;
     left:260px;
     top:0px;
     height:640px;
     width:1030px;   
     text-align:center;
     font-family:monospace;
     font-weight: 900;
     font-size:24px;   
  }
  #messageframe{
    position:absolute;
    bottom:20px;
    left:260px;  
 }
 textarea {
    border: none;
    overflow: auto;
    outline: none;

    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}
 #messagetable{
    position:relative;
    top:10px;
    left:0px;
    width:1000px;
}
#messagetable .me{
    float:right;
    display:block;
 }
 #messagetable .other{
     display:block;
     float:left;
 }    
</style>
<script>
  function checkwhoclicked(clicked_id){
      var name=clicked_id;
      document.cookie="friendname="+name;
  }
</script>    
<script src="jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>    
$(document).ready(function(){
    $("button").click(function(){
       var name=$.cookie("friendname");
       $.post('setfriend.php',{friendname:name},function(data,status){
         $("#messagetable").html(data);
       });
    });
    $("#sendmessage").click(function(){
         var mess=$("#message").val();
         $("#message").val("");
         $.post('getmessage.php',{message:mess},function(data,status){
             $("button").click();
         });
     });
});
</script>    
</head>    
<body>
<div id="leftmenu">Members</div>    
<div id="mainmenu">Chat</div>
<div id="messageframe">
Message:<textarea rows="1" cols="110" name="message" id="message" size="1000"></textarea>
<input type="button" id="sendmessage" value="Send">
</div>
<table id="messagetable"></table>    
<?php
  $conn=new mysqli('localhost','root','','ritesh');
  $sql="select * from users;";
  $result=$conn->query($sql);
  if($result->num_rows>0){
      echo '<table id="friendstable">';
      while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo '<td>';
          echo '<button id="'.$row['name'].'"'.'onclick="checkwhoclicked(this.id)"'.">".$row['name']."</button>";
          echo '</td>';
          echo '</tr>';
      }
       echo '</table>';
  }
?>
</body>
</html>