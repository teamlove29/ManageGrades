<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];

$sql = "INSERT INTO `student_tb` (`std_id`, `std_code`, `std_name`) VALUES (NULL, '".$code."', '".$name."')";
$query = $conn->query($sql);



if($query == TRUE){
    header( "location: ../../view/managerStudent/ManagerStudent.php?susccess=1");
}
else{
    header( "location: ../../view/managerStudent/ManagerStudent.php?susccess=2");
}





?>