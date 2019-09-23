<?php session_start();?>

<?php
    require_once('../../model/connect.php');
	// ini_set('display_errors', 1);
    error_reporting(0);

    // $encode = base64_encode($pass);
// $decode = base64_decode($encode);
// echo $encode." = ".$decode;
    $username = $_POST['txtuser'];
    $enCodePass = $_POST['txtPass'];
    $password = base64_encode($enCodePass);

$sql ="SELECT * FROM `member_tb` WHERE `mb_user` = '".$username."' AND `mb_pass` = '".$password."'";
$query = $conn->query($sql);
if($row = $query->num_rows > 0){

    $result = $query->FETCH_ASSOC();
    $_SESSION['Type_id'] = $result['mb_type'];
    $_SESSION['id'] = $result['mb_user'];
    if($_SESSION['Type_id'] == 1){
        header( "location: ../../view/main/Main.php");
    }
    else{
        header( "location: ../../view/auth/auth.php");
    }

}
else{
    header( "location: ../../index.php?susccess=2");
}


	mysqli_close($conn);
?>
