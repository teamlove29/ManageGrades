<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$name  = $_POST['txtname'];
$card = $_POST['txtcard'];
$birth = $_POST['txtbirth'];
$email = $_POST['txtemail'];

$day = substr($birth,-2);
$month = substr($birth,-5,2);
$year = 543 + substr($birth,-10,4);
$yearsub = substr($year ,-2);
$cardsub = substr($card,-4);
$realPass = $day.$month.$yearsub.$cardsub;
// แปลงรหัสผ่าน
$password = base64_encode($realPass);

$sql = "INSERT INTO `teacher_tb` (`tc_id`, `tc_code`, `tc_name`, `tc_idCard`, `tc_email`, `tc_date`) 
        VALUES (NULL, '".$code."', '".$name."', '".$card."', '".$email."','".$birth."')";
$query = $conn->query($sql);
$sqlMb = "INSERT INTO `member_tb` (`mb_id`, `mb_user`, `mb_pass`, `mb_type`) 
        VALUES (NULL, '".$code."', '".$password."', '2')";
$queryMb = $conn->query($sqlMb);


if($query == TRUE AND $queryMb == TRUE){
    header( "location: ../../view/managerPersonnel/ManagerPersonnel.php?susccess=1");
}
else{
    header( "location: ../../view/managerPersonnel/ManagerPersonnel.php?susccess=2");
}





?>