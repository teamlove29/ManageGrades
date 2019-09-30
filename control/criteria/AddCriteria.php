<?php
session_start();
include '../../model/connect.php';
$code = $_POST['txtcode'];
$A = $_POST['txtA'];
$Bplus = $_POST['txtBpuls'];
$B = $_POST['txtB'];
$Cplus = $_POST['txtCpuls'];
$C = $_POST['txtC'];
$Dplus = $_POST['txtDpuls'];
$D = $_POST['txtD'];
$name = $_POST['txtname'];

for($i=0;$i<7;$i++){
    if($i == 0){
        $score = $A;
        $font = 'A';
    }
    else if($i == 1){
        $score = $Bplus;
        $font = 'B+';
    }
    else if($i == 2){
        $score = $B;
        $font = 'B';
    }
    else if($i == 3){
        $score = $C;
        $font = 'C+';
    }
    else if($i == 4){
        $score = $Cplus;
        $font = 'C';
    }
    else if($i == 5){
        $score = $Dplus;
        $font = 'D+';
    }
    else if($i == 6){
        $score = $D;
        $font = 'D';
    }
    $sql = "INSERT INTO `criteria_tb` (`ctr_id`, `ctr_number`, `ctr_score`, `ctr_font`, `ctr_name`) 
    VALUES (NULL, '".$code ."', '".$score."', '".$font."', '".$name."')";
    $query = $conn->query($sql);
    
}

    
    if($query == TRUE){
        header( "location: ../../view/setScore/SubjectList.php?susccess=1");
    }
    else{
        header( "location: ../../view/setScore/SubjectList.php?susccess=2");
    }





?>