<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];
$credit = $_POST['txtcredit'];



$sql = "UPDATE `subject_tb` SET `Sub_code`='".$code."',`Sub_Name`='".$name."',`Sub_Credit`='".$credit ."' 
        WHERE Sub_id = '".$_SESSION['editID']."'";
$query = $conn->query($sql);



if($query == TRUE){
    header( "location: ../../view/managerSubject/ManagerSubject.php?susccess=1");
}
else{
    header( "location: ../../view/managerSubject/ManagerSubject.php?susccess=2");
}
?>