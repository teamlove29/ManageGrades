<?php
session_start();
include '../../model/connect.php';
$code = $_POST['subCode'];
$tcname  = $_POST['TeacName'];
$term = $_POST['term'];
$year = $_POST['year'];
$realyear = $term."/".$year;


if($_SESSION['EditProgream'] != ""){
    
    $sqlEdit = "UPDATE `course_tb` SET `Cos_term`='".$realyear."',`Sub_Code`='".$code."',`Teach_code`='".$tcname."' 
                WHERE Cos_id = '".$_SESSION['EditProgream']."'";
        $queryEdit = $conn->query($sqlEdit);
        $_SESSION['EditProgream'] = '';
        if($queryEdit){
            header( "location: ../../view/managerProgram/ManagerProgram.php?susccess=1");
        }
        else{
            header( "location: ../../view/managerProgram/ManagerProgram.php?susccess=2");
        }
}
else{

    $sql = "INSERT INTO `course_tb` (`Cos_id`, `Cos_term`, `Sub_Code`, `Teach_code`) 
            VALUES (NULL, '".$realyear."', '".$code."', '".$tcname."');";
    $query = $conn->query($sql);
    if($query == TRUE){
        header( "location: ../../view/managerProgram/ManagerProgram.php?susccess=1");
    }
    else{
        header( "location: ../../view/managerProgram/ManagerProgram.php?susccess=2");
    }
}




?>