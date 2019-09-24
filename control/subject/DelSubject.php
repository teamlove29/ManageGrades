<?php
session_start();
include_once('../../model/connect.php');
$sql = "DELETE FROM `subject_tb` WHERE Sub_id= '".$_GET['id']."' ";
$query = $conn->query($sql);

if($query==TRUE)
{
    header( "location:  ../../view/managerSubject/ManagerSubject.php?susccess=1");
}
else
{
    header( "location: ../../view/managerSubject/ManagerSubject.php?susccess=2");
}
mysqli_close($conn);
?>

</html>
