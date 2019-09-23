<?php
session_start();
include_once('../../model/connect.php');
 $ID = $_GET['id'];
$sql = "DELETE FROM `teacher_tb` WHERE tc_id= '".$ID."' ";
$query = $conn->query($sql);
if($query==TRUE)
{
    header( "location:  ../../view/managerPersonnel/managerPersonnel.php?susccess=1");
}
else
{
    header( "location: ../../view/managerPersonnel/managerPersonnel.php?susccess=2");
}
mysqli_close($conn);
?>

</html>
