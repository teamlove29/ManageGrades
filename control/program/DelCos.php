<?php
session_start();
include_once('../../model/connect.php');

$sql = "DELETE FROM `coursename_tb` WHERE Cos_code= '".$_GET['ID']."' ";
$query = $conn->query($sql);

if($query==TRUE)
{
    header( "location:  ../../view/managerProgram/Program.php?susccess=1");
}
else
{
    header( "location: ../../view/managerProgram/Program.php?susccess=2");
}
mysqli_close($conn);
?>

</html>
