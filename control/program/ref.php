<?php 
session_start();
$_SESSION['EditProgream'] = "";


header( "location: ../../view/managerProgram/ManagerProgram.php?ID=".$_SESSION['showprogram']."");

?>