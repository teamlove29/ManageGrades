<?php session_start();?>

<?php
    require_once('../../model/connect.php');
    // error_reporting(0);

// $decode = base64_decode($encode);
    $password = base64_encode($_POST['txtpass']);
    $passnew = $_POST['txtpassnew'];
    $passnew2 = $_POST['txtpassnew2'];
    $sql ="SELECT * FROM `member_tb` WHERE `mb_user` = '".$_SESSION['id']."' AND `mb_pass` = '".$password."'";
    $query = $conn->query($sql);
    $result = $query->FETCH_ASSOC();
    $id = $result['mb_id'];
    $realPass = base64_encode($passnew);
if($passnew == $passnew2 && $row = $query->num_rows > 0){
    $sql = "UPDATE `member_tb` SET `mb_pass`= '".$realPass."' WHERE mb_id = '".$id."'";
    $query = $conn->query($sql);
    if($query){
        header( "location: ../../view/editPass/EditPass.php?susccess=1");
    }
}
else{
    header( "location: ../../view/editPass/EditPass.php?susccess=2");
}



	mysqli_close($conn);
?>
