<?php
session_start();
include_once('../../model/connect.php');
$sqlsearch = "SELECT * FROM `teacher_tb` WHERE tc_id= '".$_GET['id']."' ";
$querysearch = $conn->query($sqlsearch);
$result = $querysearch->FETCH_ASSOC();
$code = $result['tc_code'];
$sql = "DELETE FROM `teacher_tb` WHERE tc_id= '".$_GET['id']."' ";
$query = $conn->query($sql);

if($query==TRUE)
{
    $sqlmb = "DELETE FROM `member_tb` WHERE mb_user= '".$code."' ";
    $querymb = $conn->query($sqlmb);
    header( "location:  ../../view/managerPersonnel/managerPersonnel.php?susccess=1");
}
else
{
    header( "location: ../../view/managerPersonnel/managerPersonnel.php?susccess=2");
}
mysqli_close($conn);
?>

</html>
