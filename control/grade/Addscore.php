<?php
session_start();
include '../../model/connect.php';

$grade = $_POST['txtscore'];

       if(($grade>100)||($grade<0)) {    
         echo "เกรดที่ได้  : ไม่สามารถคิดเกรดได้ คะแนนเกิน".'<br>';   
      }
      else if (($grade>=79.5)&&($grade<=100)) {    
         $gradeSum = "A";   
      }
       else if (($grade>=74.5)&&($grade<=79.4)) {    
         $gradeSum = "B+";   
      }
       else if (($grade>=69.5)&&($grade<=74.4)) {       
         $gradeSum = "B";    
      }
       else if (($grade>=64.5)&&($grade<=69.4)) {
         $gradeSum = "C+";    
      }
       else if (($grade>=59.5)&&($grade<=64.4)) {    
         $gradeSum = "C";   
      }
       else if (($grade>=54.5)&&($grade=59.4)) {            
         $gradeSum = "D+";    
      }
       else if (($grade>=49.5)&&($grade<=54.4)) {       
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