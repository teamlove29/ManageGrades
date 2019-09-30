<?php
session_start();
include '../../model/connect.php';
$codeCtr = $_POST['txtCtr'];

$sql = "UPDATE `course_tb` SET `ctr_number`='".$codeCtr."'
        WHERE Sub_Code = '".$_SESSION['ctrname']."' ";
$query = $conn->query($sql);

if($query == TRUE){
    $_SESSION['editcos'] = '';
    header( "location: ../../view/setScore/ManagerGrade.php?susccess=1&SJ_ID=".$_SESSION['ctrname']."");
}
else{
    $_SESSION['editcos'] = '';
    header( "location: ../../view/setScore/ManagerGrade.php?susccess=2&SJ_ID=".$_SESSION['ctrname']."");
}
?>