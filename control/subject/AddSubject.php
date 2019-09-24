<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];
$credit = $_POST['txtcredit'];

$sql = "INSERT INTO `subject_tb` (`Sub_id`, `Sub_code`, `Sub_Name`, `Sub_Credit`) 
        VALUES (NULL, '".$code ."', '".$name."', '".$credit."');";
$query = $conn->query($sql);

if($query == TRUE){
    header( "location: ../../view/managerSubject/ManagerSubject.php?susccess=1");
}
else{
    header( "location: ../../view/managerSubject/ManagerSubject.php?susccess=2");
}





?>