<?php
session_start();
$conn=new mysqli('localhost','root','','ritesh');
$sql="select * from users where name='".$_POST['friendname']."'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$_SESSION['friendname']=$row['username'];
$sql="select * from chat where fromid='".$_SESSION['username']."'"." and toid='".$_SESSION['friendname']."' or fromid='".$_SESSION['friendname']."' and toid='".$_SESSION['username']."' order by dom";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo '<table id="messagetable">';
    while($row = $result->fetch_assoc()){
        if($row['fromid']==$_SESSION['username'])
            $id="me";
        else
            $id="other";
        echo '<tr>';
        echo '<td class="'.$id.'">'.$row['message'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}
?>