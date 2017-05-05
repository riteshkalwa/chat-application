<?php
session_start();
$_SESSION['message']=$_POST['message'];
if(isset($_SESSION['friendname'])){
$conn=new mysqli('localhost','root','','ritesh');
$stmt=$conn->prepare("insert into chat (fromid,toid,message) values (?,?,?)");
if($stmt==false)
    echo "hello";
$stmt->bind_param("sss",$fromid,$toid,$message);
$fromid=$_SESSION['username'];
$toid=$_SESSION['friendname'];
$message=$_POST['message'];
$stmt->execute();
$lastid=$conn->insert_id;
$sql="update bookings set doj=now() where message_id=".$lastid;
$conn->query($sql);
$conn->close();
}
else{
    $_SESSION['friendfailure']=1;
    header('location:home.php');
}
?>