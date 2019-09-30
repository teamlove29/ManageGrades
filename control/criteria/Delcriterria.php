<?php
session_start();
include '../../model/connect.php';
$sqlcheck = "SELECT * FROM `criteria_tb` WHERE ctr_number = '".$_GET['id']."'";
$querycheck = $conn->query($sqlcheck);

if($querycheck->num_rows > 0){

    $sql = "DELETE FROM `criteria_tb` WHERE ctr_number= '".$_GET['id']."' ";
    $query = $conn->query($sql);   

}


if($query==TRUE)
{
    header( "location:  ../../view/setScore/SubjectList.php?susccess=1");
}
else
{
    header( "location: ../../view/setScore/SubjectList.php?susccess=2");
}
mysqli_close($conn);
?>