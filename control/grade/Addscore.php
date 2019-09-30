<?php
session_start();
include '../../model/connect.php';

$sqltool = "SELECT course_tb.Sub_Code,course_tb.ctr_number,criteria_tb.ctr_score,criteria_tb.ctr_font FROM `course_tb` 
INNER JOIN criteria_tb
ON criteria_tb.ctr_number = course_tb.ctr_number
WHERE course_tb.Sub_Code = '".$_SESSION['ctrname']."'";
$querytool = $conn->query($sqltool);
while($row = $querytool ->FETCH_ASSOC()){
    if($row['ctr_font'] == 'A'){
        $scoreA = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'B+'){
        $scoreBb = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'B'){
        $scoreB = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'C+'){
        $scoreCc = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'C'){
        $scoreC = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'D+'){
        $scoreDd = $row['ctr_score'];
    }
    else if($row['ctr_font'] == 'D'){
        $scoreD = $row['ctr_score'];
    }
}

$grade = $_POST['txtscore'];

       if(($grade>100)||($grade<0)) {    
         echo "เกรดที่ได้  : ไม่สามารถคิดเกรดได้ คะแนนเกิน".'<br>';   
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

$sqlcheck = "SELECT * FROM `grade_tb` 
             WHERE `std_code` ='".$_SESSION['STD_ID']."' 
             AND `sub_code` = '".$_SESSION['SJ_ID']."'";
$querycheck = $conn->query($sqlcheck);
// $resultcheck = $querycheck->FETCH_ASSOC();

    if($querycheck -> num_rows > 0){
        //แกไข
        $sql = "UPDATE  `grade_tb` SET `GPA`='".$grade."',`grade_font`='".$gradeSum."' 
                WHERE `std_code` ='".$_SESSION['STD_ID']."' 
                AND `sub_code` = '".$_SESSION['SJ_ID']."'";
        $query = $conn->query($sql);
            if($query==TRUE){
                header("location: ../../view/setScore/ManagerGrade.php?success=1&SJ_ID=".$_SESSION['SJ_ID']."");
            }
            else{
                header("location: ../../view/setScore/ManagerGrade.php?success=2&SJ_ID=".$_SESSION['SJ_ID']."");   
            }
    }
    else{
        //เพิ่ม
        $sql = "INSERT INTO `grade_tb` (`grad_id`, `std_code`, `sub_code`, `GPA`, `grade_font`) 
                VALUES (NULL, '".$_SESSION['STD_ID']."', '".$_SESSION['SJ_ID']."', '".$grade."', '".$gradeSum."');";
        $query = $conn->query($sql);
            if($query==TRUE){
                header("location: ../../view/setScore/ManagerGrade.php?success=1&SJ_ID=".$_SESSION['SJ_ID']."");
            }
            else{
                header("location: ../../view/setScore/ManagerGrade.php?success=2&SJ_ID=".$_SESSION['SJ_ID']."");   
            }
    }



mysqli_close($conn);
?>