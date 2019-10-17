<?php session_start();?>

<?php
    require_once('../../model/connect.php');
    // error_reporting(0);

// $decode = base64_decode($encode);
    $code = $_POST['txtcode'];
    $email = $_POST['txtemail'];
    
    // $password = base64_encode($enCodePass);

$sql ="SELECT * FROM `member_tb` WHERE `mb_user` = '".$code."'";
$query = $conn->query($sql);


if($row = $query->num_rows > 0){
    // $checkCodeStr = substr($_POST['txtcode'],0,5);
    // echo $checkCodeStr;
    // return false;
    $sql2 ="SELECT * FROM `member_tb` WHERE `mb_user` = '".$code."'";
    $query2 = $conn->query($sql2);
    $result2 = $query2->FETCH_ASSOC();
    $decode = base64_decode($result2['mb_pass']);
    $_SESSION['decode'] = $decode;
    header( "location: ../../view/forgetPass/showPass.php?");


}
else{
    header( "location: ../../view/forgetPass/ForgetPass.php?susccess=2");
}


	mysqli_close($conn);
?>
