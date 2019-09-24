<?php session_start();?>

<?php
    require_once('../../model/connect.php');
    // error_reporting(0);

// $decode = base64_decode($encode);
    $code = $_POST['txtcode'];
    $email = $_POST['txtemail'];
    // $password = base64_encode($enCodePass);

$sql ="SELECT * FROM `teacher_tb` WHERE `tc_code` = '".$code."' AND `tc_email` = '".$email."'";
$query = $conn->query($sql);
if($row = $query->num_rows > 0){
    $sql ="SELECT * FROM `member_tb` WHERE `mb_user` = '".$code."'";
    $query = $conn->query($sql);
    $result = $query->FETCH_ASSOC();
    $decode = base64_decode($result['mb_pass']);
    $_SESSION['decode'] = $decode;
    header( "location: ../../view/forgetPass/showPass.php?");


}
else{
    header( "location: ../../view/forgetPass/ForgetPass.php?susccess=2");
}


	mysqli_close($conn);
?>
