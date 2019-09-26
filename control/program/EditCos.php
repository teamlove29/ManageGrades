<?php
session_start();
include '../../model/connect.php';
$code = $_POST['courseCode'];
$name  = $_POST['courseName'];




$sql = "UPDATE `coursename_tb` SET `Cos_code`='".$code."',`Cos_name`='".$name."' 
        WHERE Cos_code = '".$_SESSION['editcos']."' ";
$query = $conn->query($sql);

if($query == TRUE){
    $_SESSION['editcos'] = '';
    header( "location: ../../view/managerProgram/Program.php?susccess=1");
}
else{
    $_SESSION['editcos'] = '';
    header( "location: ../../view/managerProgram/Program.php?susccess=2");
}
?>