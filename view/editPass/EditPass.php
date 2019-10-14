<?php
session_start();
include_once('../../model/connect.php');error_reporting(0);
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
// ู$id = "";
// $_SESSION['Teach_edit'] = "";
// $id = $_GET['Teach_id'];
// $_SESSION['Teach_edit'] = $id;
// $sql = "SELECT * FROM teacher_tb WHERE Teach_id = '$id'";
// $query = $conn->query($sql);
// $result = $query->fetch_assoc()
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>เปลี่ยนรหัสผ่าน</title>

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
                    <a href="../managerPersonnel/managerPersonnel.php">จัดการบุคลากร</a>
                </li>
            <?php } else{?>
                <li>
                    <a href="">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="../grade/GradeMain.php">จัดการผลการเรียน</a>
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
            <a class="btn btn-sm btn-secondary m-1" href="../main/Main.php"> < กลับหน้าเดิม</a>
            <h3 class="text-center">เปลี่ยนรหัสผ่าน</h3>
            <hr>
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

            <form id="myform" name='myform' method="POST" action="../../control/editPass/EditPass.php">
                <!-- รหัสผ่านเดิม -->
                <div class="form-group row">
                    <label for="txtpass"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">รหัสผ่านเดิม : </label>
                    <div class="col-sm-5">
                        <input type="password" name="txtpass" class="form-control form-control-sm" id="txtpass" 
                        pattern="{5,20}"title="Must contain at least 1 Capital letter, 1 small letter and 5 to 20 characters" required autofocus></div>
        
                </div>
               
                <!-- รหัสผ่านใหม่ -->
                <div class="form-group row">
                    <label for="txtpassnew"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">รหัสผ่านใหม่ : </label>
                    <div class="col-sm-5">
                        <input type="password" name="txtpassnew" class="form-control form-control-sm" id="txtpassnew"  
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}"title="Must contain at least 1 Capital letter, 1 small letter and 5 to 20 characters" required autofocus>
                        <label for="verified" class="col-form-label col-md-12" style="color:Tomato; ">
                        * Must contain at least one number, one uppercase, lowercase letter and at least 5 or more characters
                        </label>
                    </div>

                </div>
                <!-- ยืนยันรหัสผ่านใหม่ -->
                <div class="form-group row">
                    <label for="txtpassnew2"
                        class="col-sm-4 text-right col-form-label col-form-label-sm font-weight-bold">ยืนยันรหัสผ่านใหม่ : </label>
                    <div class="col-sm-5">
                        <input type="password" name="txtpassnew2" class="form-control form-control-sm" id="txtpassnew2" 
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}"title="Must contain at least 1 Capital letter, 1 small letter and 5 to 20 characters" required autofocus>
                        <label for="verified" class="col-form-label col-md-12" style="color:Tomato; ">
                        * Must contain at least one number, one uppercase, lowercase letter and at least 5 or more characters
                        </label>
                    </div> 

                        <input type="checkbox" onclick="myShowpass()">Show Password
                </div>

     
            <div class="row">
                <button class="btn btn-sm btn-success mx-auto col-2">ยืนยัน</button>
            </div>
        </div>
        </form>
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

        <script src="../../securitysc"></script>

        <script>
        function myShowpass() {
        var oldpass = document.getElementById("txtpass");
        var newpass1 = document.getElementById("txtpassnew");
        var newpass2 = document.getElementById("txtpassnew2");
        
        if (newpass1.type === "password" && newpass2.type === "password" && oldpass.type === "password") {
            oldpass.type = "text";
            newpass1.type = "text";
            newpass2.type = "text";

        } else {
            oldpass.type = "password";
            newpass1.type = "password";
            newpass2.type = "password";
        }
        }
        </script>
</body>

</html>