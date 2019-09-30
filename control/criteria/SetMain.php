<?php
session_start();
include '../../model/connect.php';



$sqlchang = "SELECT * FROM `criteria_tb` WHERE ctr_number = '1'";
$querychang = $conn->query($sqlchang);
while($rowchang = $querychang->FETCH_ASSOC()){
    $sql = "UPDATE `criteria_tb` SET `ctr_number`= '0' WHERE ctr_id = '".$rowchang['ctr_id']."'";
    $query = $conn->query($sql); 
}



$sqlcheck = "SELECT * FROM `criteria_tb` WHERE ctr_number = '".$_GET['id']."'";
$querycheck = $conn->query($sqlcheck);

while($row = $querycheck->FETCH_ASSOC()){

    $sql = "UPDATE `criteria_tb` SET `ctr_number`= '1' WHERE ctr_id = '".$row['ctr_id']."'";
    $query = $conn->query($sql);   

}


$sqlchang2 = "SELECT * FROM `criteria_tb` WHERE ctr_number = '0'";
$querychang2 = $conn->query($sqlchang2);
while($rowchang2 = $querychang2->FETCH_ASSOC()){
    $sql = "UPDATE `criteria_tb` SET `ctr_number`= '".$_GET['id']."' WHERE ctr_id = '".$rowchang2['ctr_id']."'";
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