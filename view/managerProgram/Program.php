<?php
session_start();
include_once('../../model/connect.php');
error_reporting(0);

if($_SESSION['Type_id'] == 2){
    $sql ="SELECT * FROM `teacher_tb` WHERE `tc_code` = '".$_SESSION['id']."'";
    $query = $conn->query($sql);
    $result = $query -> FETCH_ASSOC();
    $name = $result['tc_name'];
    $code = $result['tc_code'];
    $date = $result['tc_date'];
}
else{
    $name = 'Admin';
}
$sql = "SELECT DISTINCT Cos_code, Cos_name FROM coursename_tb";
$query = $conn->query($sql);

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


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จัดการแผนการเรียน</title>

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
                    <a href="../main/Main.php">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="../managerPersonnel/ManagerPersonnel.php">จัดการบุคลากร</a>
                </li>
                <li>
                    <a href="../managerSubject/ManagerSubject.php">จัดการรายวิชา</a>
                </li>
                <li>
                    <a href="../managerStudent/ManagerStudent.php">จัดการนักศึกษา</a>
                </li>
                <li>
                    <a href="../managerProgram/Program.php">จัดการแผนการเรียน</a>
                </li>
                <li>
                    <a href="../register/Register.php">ลงทะเบียน</a>
                </li>
            <?php } else{?>
                <li>
                    <a href="">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="../setScore/SubjectList.php">จัดการผลการเรียน</a>
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
            <h3>จัดการแผนการเรียน</h3>

            <form action="" method="GET">
<div class="row">
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

<a href="./AddProgram.php" class="btn btn-success btn-sm m-1 mt-3">+ แผนการเรียน</a> 

<?php if($_GET['susccess'] == 1){ ?>
    <div class="alert alert-success" role="alert">
  สำเร็จ
</div>

<?php }else if($_GET['susccess'] == 2) { ?>
    <div class="alert alert-danger" role="alert">
  มีบางอย่างผิดพลาด กรุณาตรวจสอบ
</div> <?php } ?>

<table class="table table-bordered  mx-auto">
    <thead>
        <tr>
            <th class="text-center" scope="col">รหัสแผน</th>
            <th scope="col">แผนการเรียน</th>
            <th class="text-center" scope="col">จัดการ</th>
            <th class="text-center" scope="col">แก้ไข</th>
            <th class="text-center" scope="col">ลบ</th>
          </tr>
        </thead>
        <tbody>

            <tbody>
                <tr>
                <?php 

                    $sqlshow ="SELECT DISTINCT * FROM `coursename_tb` ";


                $queryshow = $conn->query($sqlshow);
                
                while($row = $queryshow->fetch_assoc()){ ?>
                  <td class="text-center"><?php echo $row['Cos_code']; ?></td>
                  <td><?php echo $row['Cos_name']; ?></td> 
                  <td class="text-center"><a class="btn btn-dark btn-sm" href="./ManagerProgram.php?ID=<?php echo $row['Cos_code']; ?>">จัดการ</a></td>
                  <td><a class="btn btn-dark btn-sm" href="./Editprogram.php?ID=<?php echo $row['Cos_code'];?>">แก้ไข</a></td>
                  <td><a class="btn btn-danger btn-sm" href="JavaScript:if(confirm('Confirm Delete?') == true){window.location='../../control/program/DelCos.php?ID=<?php echo $row["Cos_code"];?>';}">ลบ</a></td>
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