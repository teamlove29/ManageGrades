<?php
session_start();
include '../../model/connect.php';
$code = $_POST['courseCode'];
$name  = $_POST['courseName'];

$sql = "INSERT INTO `coursename_tb` (`Cos_code`, `Cos_name`) VALUES ('".$code."', '".$name."')";
$query = $conn->query($sql);


if($query == TRUE){
    header( "location: ../../view/managerProgram/Program.php?susccess=1");
}
else{
    header( "location: ../../view/managerProgram/Program.php?susccess=2");
}





?>