<?php
session_start();
include('../../model/connect.php');

    $checkCodeStr = substr($_SESSION['id'],0,5);
    $sql ="SELECT * FROM `teacher_tb` 
    INNER JOIN course_tb
    ON teacher_tb.tc_code = course_tb.Teach_code
    WHERE teacher_tb.tc_code = '".$checkCodeStr."'";
    $query = $conn->query($sql);
    $result = $query -> FETCH_ASSOC();
    $name = $result['tc_name'];
    $code = $result['tc_code'];
    $date = $result['tc_date'];

error_reporting(0);
$_SESSION['STD_ID'] = $_GET['STD_ID'];

$sqlcheck = "SELECT * FROM `student_tb` 
             WHERE `std_code` ='".$_SESSION['STD_ID']."'";
$querycheck = $conn->query($sqlcheck);
$resultcheck = $querycheck->FETCH_ASSOC();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ใส่คะแนน</title>

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
<a class="btn btn-sm btn-secondary mb-2" href="./ManagerGrade.php?SJ_ID=<?php echo $_SESSION['SJ_ID']; ?> "> < กลับหน้าเดิม</a>
<h3>ใส่คะแนน</h3>


<label for="txtscore" class="mt-3"><?php echo $resultcheck['std_code']." ".$resultcheck['std_name'] ?></label>
<form action="../../control/grade/Addscore.php" method="POST">

<div class="row ">
<input class="form-control col-form-label col-form-label-sm col-3 ml-3 " name="txtscore" id="txtscore" placeholder="คะแนน" 
pattern="[0-9].{0,3}"title="Must be number only from 1-100"  
<?php if($_GET['socre']){ ?> value="<?php echo $_GET['socre']; ?>" <?php } ?> required autofocus>
<button class="btn btn-success btn-sm m-1 col-1">บันทึก</button> 
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

        <!-- Over Value such -1 or 101 -->
        <script type="text/javascript">
        $G("txtscore").addEvent("keyup",maxVal);
               
        var maxVal = function(){
           if(parseFloat(GEvent.element().value) > 100 || parseFloat(GEvent.element().value) < 0){
               alert('ไม่สามารถกรอกคะแนนเกิน 100 หรือต่ำกว่า 0 ได้!');
           };
       };
        </script>



</body>

</html>