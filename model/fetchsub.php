<?php
session_start();
    include('./connect.php');
    mysqli_set_charset($conn, "utf8");
    $output ='';
    error_reporting(0);

if(isset($_POST["query"]))
{
    $Search = mysqli_real_escape_string($conn, $_POST["query"]);
    $query = "
    SELECT DISTINCT course_tb.Cos_term,course_tb.Sub_Code, subject_tb.Sub_Name, subject_tb.Sub_Credit,
				course_tb.Teach_code,teacher_tb.tc_name
                FROM `course_tb` 
                INNER JOIN subject_tb
                ON course_tb.Sub_Code = subject_tb.Sub_code
                INNER JOIN teacher_tb
                ON course_tb.Teach_code = teacher_tb.tc_code
                WHERE subject_tb.Sub_code LIKE '%".$Search."%'
                OR subject_tb.Sub_Name LIKE '%".$Search."%'
                OR teacher_tb.tc_name LIKE '%".$Search."%'
                OR course_tb.Cos_term LIKE '%".$Search."%'
    ";
  }
  else
  {
   $query = "
   SELECT DISTINCT course_tb.Cos_id,course_tb.Cos_code,course_tb.Cos_term,course_tb.Sub_Code, subject_tb.Sub_Name, subject_tb.Sub_Credit,
				course_tb.Teach_code,teacher_tb.tc_name
                FROM `course_tb` 
                INNER JOIN subject_tb
                ON course_tb.Sub_Code = subject_tb.Sub_code
                INNER JOIN teacher_tb
                ON course_tb.Teach_code = teacher_tb.tc_code
                WHERE Cos_code = '".$_SESSION['showprogram']."'
   ";
  }
  $result = mysqli_query($conn, $query);
error_reporting(0);
  if(mysqli_num_rows($result) > 0)
  {
   $output .= '
    <div class="table-responsive text-center">
     <table class="table table-bordered">
     <thead class="thead-light">
      <tr>
        <th>ปีการศึกษา</th>
       <th>รหัสรายวิชา</th>
       <th class="text-left">ชื่อวิชา</th>
       <th>อาจารย์ผู้สอน</th>
       <th>แก้ไข</th>
       <th>ลบ</th>
      </tr>
      </thead>
      
   ';
   while($row = mysqli_fetch_array($result))
   {
    $output .= '
     <tr>
     <td>'.$row["Cos_term"].'</td>
      <td>'.$row["Sub_Code"].'</td>
      <td class="text-left">'.$row["Sub_Name"].'</td>
      <td>'.$row["tc_name"].'</td>
      <td><a class="btn btn-sm btn-primary" href="../managerProgram/ManagerProgram.php?CosId='.$row['Cos_id'].'&ID='.$row['Cos_code'].'">แก้ไข</a></td>
      <td><a class="btn btn-sm btn-danger" href="JavaScript:if(confirm("Confirm Delete?")== true){window.location=../control/program/DelProgram.php?"}">ลบ</a></td>
     </tr>
    ';
   }
   echo $output;
  }
  else
  {
   echo 'Data Not Found';
  }
  
?>