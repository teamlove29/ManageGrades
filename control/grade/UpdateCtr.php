<?php
session_start();
include '../../model/connect.php';
$codeCtr = $_POST['txtCtr'];

$sql = "UPDATE `course_tb` SET `ctr_number`='".$codeCtr."'
        WHERE Sub_Code = '".$_SESSION['ctrname']."' ";
$query = $conn->query($sql);




$sqlre = "SELECT course_tb.Sub_Code,course_tb.ctr_number,criteria_tb.ctr_score,criteria_tb.ctr_font FROM `course_tb` 
INNER JOIN criteria_tb
ON criteria_tb.ctr_number = course_tb.ctr_number
WHERE course_tb.Sub_Code = '".$_SESSION['ctrname']."'";
$queryre = $conn->query($sqlre);
while($rowre = $queryre ->FETCH_ASSOC()){
    if($rowre['ctr_font'] == 'A'){
        $scoreA = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'B+'){
        $scoreBb = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'B'){
        $scoreB = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'C+'){
        $scoreCc = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'C'){
        $scoreC = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'D+'){
        $scoreDd = $rowre['ctr_score'];
    }
    else if($rowre['ctr_font'] == 'D'){
        $scoreD = $rowre['ctr_score'];
    }
}


$sqltool = "SELECT * FROM `grade_tb` WHERE sub_code = '".$_SESSION['ctrname']."'";
$querytool = $conn->query($sqltool);
while($row = $querytool->FETCH_ASSOC()){


   

    $grade = $row['GPA'];
    if(($grade>100)||($grade<0)) {    
      echo "เกรดที่ได้  : ไม่สามารถคิดเกรดได้ คะแนนเกิน".'<br>';   
      $grade = NULL;
   }
   else if (($grade>=$scoreA)&&($grade<=100)) {    
      $gradeSum = "A";   
   }
    else if ($grade>=$scoreBb) {    
      $gradeSum = "B+";   
   }
    else if ($grade>=$scoreB) {       
      $gradeSum = "B";    
   }
    else if ($grade>=$scoreCc) {
      $gradeSum = "C+";    
   }
    else if ($grade>=$scoreC) {    
      $gradeSum = "C";   
   }
    else if ($grade>=$scoreDd) {            
      $gradeSum = "D+";    
   }
    else if ($grade>=$scoreD) {       
      $gradeSum = "D";    
   }
    else {$gradeSum = "F";}   

    $sql = "UPDATE  `grade_tb` SET `grade_font`='".$gradeSum."' 
            WHERE `std_code` ='".$row[std_code]."' 
            AND `sub_code` = '".$_SESSION['ctrname']."'";
    $query = $conn->query($sql);

}


if($query == TRUE){
    $_SESSION['editcos'] = '';
    header( "location: ../../view/setScore/ManagerGrade.php?susccess=1&SJ_ID=".$_SESSION['ctrname']."");
}
else{
    $_SESSION['editcos'] = '';
    header( "location: ../../view/setScore/ManagerGrade.php?susccess=2&SJ_ID=".$_SESSION['ctrname']."");
}
?>