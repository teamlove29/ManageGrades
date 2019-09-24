<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];
$card = $_POST['txtcard'];
$birth = $_POST['txtbirth'];
$email = $_POST['txtemail'];



$sql = "UPDATE `teacher_tb` SET `tc_code`='".$code."',`tc_name`='".$name."',
                `tc_idCard`='".$card."',`tc_email`='".$email."',`tc_date`='".$birth."' WHERE tc_id = '".$_SESSION['editID']."'";
$query = $conn->query($sql);



if($query == TRUE){
    header( "location: ../../view/managerPersonnel/ManagerPersonnel.php?susccess=1");
}
else{
    header( "location: ../../view/managerPersonnel/ManagerPersonnel.php?susccess=2");
}
?>