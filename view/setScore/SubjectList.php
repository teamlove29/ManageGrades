<?php
session_start();
include('../../model/connect.php');

    $sql ="SELECT * FROM `teacher_tb` 
    INNER JOIN course_tb
    ON teacher_tb.tc_code = course_tb.Teach_code
    WHERE teacher_tb.tc_code = '".$_SESSION['id']."'";
    $query = $conn->query($sql);
    $result = $query -> FETCH_ASSOC();
    $name = $result['tc_name'];
    $code = $result['tc_code'];
    $date = $result['tc_date'];

error_reporting(0);
$datePresent = date('Y') + 543;
$MoPresent = date('m') ;
$dateFuture = $datePresent + 5;
$datePast = $datePresent - 5;
if($MoPresent >= 6 AND $MoPresent <= 12){
    $txtTerm = "1/".$datePresent;
}
else{
    $txtTerm = "2/".$datePresent;
}
// echo "2/".$datePresent;$code = $_GET['txtkey'];

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จักการผลการเรียน</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../../style/Style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
        crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
        crossorigin="anonymous"></script>
</head>

<body class="setfont">
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="text-center">ระบบจัดการ</h3>
            </div>
            <img class="circle-img mt-4"
                src="http://americanmuslimconsumer.com/wp-content/uploads/2013/09/blank-user.jpg"
                alt="">
            <p class="text-center text-light mt-3 setfont"><?php echo $name; ?> </p>

            <ul class="list-unstyled components pl-2">
            <?php if($_SESSION['Type_id'] == 1){ ?>
                <li>
                    <a href="">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="../managerPersonnel/ManagerPersonnel.php">จัดการบุคลากร</a>
                </li>
                <li>
                    <a href="../managerSubject/ManagerSubject.php">จัดการรายวิชา</a>
                </li>
                <li>
                    <a href="../managerProgram/ManagerProgram.php">จัดการแผนการสอน</a>
                </li>
            <?php } else{?>
                <li>
                    <a href="../main/Main.php">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href=" ">จัดการผลการเรียน</a>
                </li>
            <?php } ?>
            </ul>
            
            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../../index.php" class="article">กลับเมนูหลัก</a>
                </li>
                <li>
                    <a href="../../control/logout/Logout.php" class="download">ออกจากระบบ</a>
                </li>

            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span>เมนูหลัก</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
        </button>
    </div>
</nav>
<h3>จักการผลการเรียน</h3>
<a class="btn btn-success btn-sm mt-2" href="../criteria/SetCriteria.php">+ เพิ่มเกณฑ์คะแนน</a>
<div class="row">
<?php 

$sqlcheck = "SELECT DISTINCT `ctr_number` FROM `criteria_tb`";
    $querycheck = $conn->query($sqlcheck);
    for($i = 1;$i<=$querycheck->num_rows;$i++){
?>
<div class="card mt-2 col-3 ml-3" style="width: 18rem;">
  <div class="card-body">
  <?php 
    $sqlCriteria = "SELECT DISTINCT ctr_number,ctr_name FROM `criteria_tb` WHERE ctr_number = '".$i."'";
    $queryCriteria = $conn->query($sqlCriteria); 

while($resultCriteria = $queryCriteria->FETCH_ASSOC()){ 
    ?>
    <h5 class="card-title">  <?php   if($i == 1){ echo $resultCriteria['ctr_name']." ".'[ค่าตั้งต้น]';}else{echo $resultCriteria['ctr_name'];} ?></h5>
    <a class="btn btn-outline-info btn-sm" href="../criteria/EditCriteria.php?CTID=<?php echo $i; ?>">แก้ไข</a>
<?php if($i != 1 ){?>
    <td><a class="btn btn-outline-secondary btn-sm" href="JavaScript:if(confirm('แน่ใจนะ ?') == true){window.location='../../control/criteria/SetMain.php?id=<?php echo $resultCriteria["ctr_number"];?>';}">ตั้งเป็นค่าหลัก</a></td>
<td><a class="btn btn-danger btn-sm" href="JavaScript:if(confirm('คุณแน่ใจแล้วใช่ไหม?') == true){window.location='../../control/criteria/Delcriterria.php?id=<?php echo $resultCriteria["ctr_number"];?>';}">ลบ</a></td>
<?php } ?>
<?php } ?>


  </div>
</div>
<?php } ?>



</div>


<form action="" method="GET">
<div class="row mt-3">
<select class="form-control col-form-label col-form-label-sm col-4 ml-3" name="txtkey" id="">
<option value="" >ภาคเรียน/ปีการศึกษา</option>
<?php 
for($i=0;$i<5;$i++) { 
    for($j=1;$j<=2;$j++){
        $test = $datePresent-$i;
        $va = $j."/".$test;
        echo "<option value=".$va.">";
        echo $j."/";
        echo $datePresent-$i;
        echo "</option>";
    }
}
?>
</select>
<button class="btn btn-secondary btn-sm m-1 col-1">ค้นหา</button> 
</div>
</form>



            <!-- alert  -->
            <?php if($_GET['susccess'] == 1){ ?>
<div class="alert alert-success" role="alert">
สำเร็จ
</div>

<?php }else if($_GET['susccess'] == 2) { ?>
<div class="alert alert-danger" role="alert">
มีบางอย่างผิดพลาด ลองอีกครั้ง
</div> <?php } ?>
<!-- end alert  -->

<table class="table table-bordered mt-3 mx-auto">
    <thead>
        <tr>
            <th class="text-center" scope="col">รหัสวิชา</th>
            <th scope="col">รายวิชา</th>
            <th class="text-center" scope="col">จัดการ</th>
          </tr>
        </thead>
        <tbody>

            <tbody>
            <td colspan="3" class="text-center">ปีการศึกษา <?php if($_GET['txtkey']){echo $_GET['txtkey'];} else{echo $txtTerm." [ปัจจุบัน]";} ?></td>
                <tr>
                <?php 
                if($_GET['txtkey'] != ""){
                    $sqlshow ="SELECT * FROM `teacher_tb` 
                INNER JOIN course_tb
                ON teacher_tb.tc_code = course_tb.Teach_code
                INNER JOIN subject_tb
                ON subject_tb.Sub_code = course_tb.Sub_Code
                WHERE teacher_tb.tc_code = '".$_SESSION['id']."' AND course_tb.Cos_term = '".$_GET['txtkey']."'";
                }
                else{
                    $sqlshow ="SELECT * FROM `teacher_tb` 
                INNER JOIN course_tb
                ON teacher_tb.tc_code = course_tb.Teach_code
                INNER JOIN subject_tb
                ON subject_tb.Sub_code = course_tb.Sub_Code
                WHERE teacher_tb.tc_code = '".$_SESSION['id']."' AND course_tb.Cos_term = '".$txtTerm."'";
                }
                $queryshow = $conn->query($sqlshow);
                
                while($row = $queryshow->fetch_assoc()){ ?>
                  <td class="text-center"><?php echo $row['Sub_Code']; ?></td>
                  <td><?php echo $row['Sub_Name']; ?></td> 
                  <td class="text-center"><a class="btn btn-dark btn-sm" href="./ManagerGrade.php?SJ_ID=<?php echo $row['Sub_Code']; ?>">จัดการ</a></td>
                </tr>
                <?php } ?>
              </tbody>
      </table>


</div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
            crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>
</body>

</html>