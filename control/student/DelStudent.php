<?php
session_start();
include_once('../../model/connect.php');

$sql = "DELETE FROM `student_tb` WHERE std_id= '".$_GET['Std_Code']."' ";
$query = $conn->query($sql);

if($query==TRUE)
{
    header( "location:  ../../view/managerStudent/ManagerStudent.php?susccess=1");
}
else
{
    header( "location: ../../view/managerStudent/ManagerStudent.php?susccess=2");
}
mysqli_close($conn);
?>

</html>
