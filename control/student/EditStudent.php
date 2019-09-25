<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];




$sql = "UPDATE `student_tb` SET `std_code` = '".$code ."', `std_name` = '".$name."' 
        WHERE `std_id` = '".$_SESSION['editstd']."'";
$query = $conn->query($sql);

if($query == TRUE){
    $_SESSION['editstd'] = "";
    header( "location: ../../view/managerStudent/ManagerStudent.php?susccess=1");
}
else{
    $_SESSION['editstd'] = "";
    header( "location: ../../view/managerStudent/ManagerStudent.php?susccess=2");
}
?>