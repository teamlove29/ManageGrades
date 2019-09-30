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
$_SESSION['SJ_ID'] = $_GET['SJ_ID'];

$sqlsub ="SELECT * FROM `subject_tb` 
WHERE Sub_code = '".$_SESSION['SJ_ID']."'";
$querysub = $conn->query($sqlsub);
$resultsub = $querysub -> FETCH_ASSOC();


error_reporting(0);

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
<a class="btn btn-sm btn-secondary mb-2" href="../../view/setScore/SubjectList.php"> < กลับหน้าเดิม</a>
<h3>จักการผลการเรียน วิชา : <?php echo $resultsub['Sub_Name'] ?></h3>



<form action="../../control/grade/UpdateCtr.php" method="POST">


<?php 
$_SESSION['ctrname'] = $_GET['SJ_ID'];
$sqlname = "SELECT DISTINCT course_tb.ctr_number, criteria_tb.ctr_name FROM `course_tb` 
            INNER JOIN criteria_tb 
            ON criteria_tb.ctr_number = course_tb.ctr_number WHERE Sub_Code ='".$_SESSION['ctrname']."'";
$queryname = $conn->query($sqlname);
$resultname = $queryname->FETCH_ASSOC();
?>

<h5 class="mt-3">เกณฑ์ที่ใช้ : <?php echo $resultname['ctr_name']; ?></h5>
<?php 
// Update ctr

$sqlcrt = "SELECT DISTINCT ctr_number,ctr_name FROM `criteria_tb` ";
$querycrt = $conn->query($sqlcrt);
?>
<div class="form-group row">
<select class="form-control col-form-label col-form-label-sm col-3 ml-3" name="txtCtr" id="" required>
<option value="">แก้ไขเกณฑ์</option>
<?php while($resultcrt = $querycrt->FETCH_ASSOC()) { ?>
<option value="<?php echo $resultcrt['ctr_number']?>"><?php echo $resultcrt['ctr_name']?></option>
<?php } ?>
</select>

<button class="btn btn-sm btn-success col-1 my-auto ml-2">แก้ไข</button>
</div>


</form>
            <!-- alert  -->
            <?php if($_GET['success'] == 1){ ?>
<div class="alert alert-success mt-2" role="alert">
สำเร็จ
</div>

<?php }else if($_GET['success'] == 2) { ?>
<div class="alert alert-danger" role="alert">
มีบางอย่างผิดพลาด ลองอีกครั้ง
</div> <?php } ?>
<!-- end alert  -->

<table class="table table-bordered mt-2 mx-auto text-center">
    <thead>
    
    
    
        <tr>
            <th class="text-center" scope="col">รหัสนักศึกษา</th>
            <th scope="col">ชื่อ - นามสกุล</th>
            <th class="text-center" scope="col">คะแนน</th>
            <th class="text-center" scope="col">เกรด</th>
            <th class="text-center" scope="col">จัดการ</th>
          </tr>
    
        </thead>
        <tbody>
        <?php 
        $sqlshow = "SELECT * FROM register_tb
                INNER JOIN course_tb
                ON register_tb.cos_code = course_tb.Cos_code
                INNER JOIN student_tb
                ON register_tb.std_code = student_tb.std_code
                WHERE course_tb.Sub_Code = '".$_GET['SJ_ID']."'
                ORDER BY register_tb.std_code";
        $queryshow = $conn->query($sqlshow);
        while($row = $queryshow->FETCH_ASSOC()) {
            $sqlgrade = "   SELECT * FROM `grade_tb` 
                            WHERE `std_code` ='".$row['std_code']."' 
                            AND `sub_code` = '".$row['Sub_Code']."'";
            $querygrade = $conn->query($sqlgrade);
            $resultgrade = $querygrade->FETCH_ASSOC();
            ?>
<tr>
<td><?php echo $row['std_code']?></td>
<td><?php echo $row['std_name']?></td>
<td><?php echo $resultgrade['GPA']?></td>
<td><?php echo $resultgrade['grade_font']?></td>
<td class="text-center"><a class="btn btn-dark btn-sm" href="./SetScore.php?STD_ID=<?php echo $row['std_code']; ?>&socre=<?php echo $resultgrade['GPA']; ?>">จัดการ</a></td>
</tr>
<?php }?>
            <tbody>

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