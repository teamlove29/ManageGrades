<?php
session_start();
include_once('../../model/connect.php');
error_reporting(0);


?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จัดการวิชาแผนการเรียน</title>

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
            <p class="text-center text-light mt-3 setfont"><?php echo $_SESSION['name']; ?> </p>

            <ul class="list-unstyled components pl-2">
            <?php if($_SESSION['Type_id'] == 1){ ?>
                <li>
                    <a href="../main/Main.php">ข้อมูลส่วนตัว</a>
                </li>
                <li>
                    <a href="../managerPersonnel/managerPersonnel.php">จัดการบุคลากร</a>
                </li>
                <li>
                    <a href="../managerSubject/ManagerSubject.php">จัดการรายวิชา</a>
                </li>
                <li>
                    <a href="">จัดการแผนการเรียน</a>
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
            <h3>จัดการวิชาแผนการเรียน</h3> 


<form action="#" method="POST">
   
                      
</form>

<?php if($_GET['susccess'] == 1){ ?>
    <div class="alert alert-success" role="alert">
  สำเร็จ
</div>

<?php }else if($_GET['susccess'] == 2) { ?>
    <div class="alert alert-danger" role="alert">
  มีบางอย่างผิดพลาด กรุณาตรวจสอบ
</div> <?php } ?>

<form>

  <!-- เลือกวิชา  -->
  <div class="form-group">
                    <label for="subCode"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">เลือกวิชา :</label>
                    <div class="col-sm-5">
                    <select name="subCode" class="form-control col-form-label col-form-label-sm" id="inputGroupSelect01" required>
<option>เลือกรายวิชา</option>

<?php  
$sqlSubject = "SELECT * FROM `subject_tb`";
$querySubject = $conn->query($sqlSubject);
while($rowSubject = $querySubject->fetch_assoc()){ ?>
<option value="<?php echo $rowSubject['Sub_code'] ?>" ><?php echo $rowSubject['Sub_code'] ." ". $rowSubject['Sub_Name']?></option>
<?php } ?>
      </select>
                    </div>
                </div>



                                     <!-- รหัสอาจารย์  -->
                                     <div class="form-group">
                    <label for="TeacName"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">รหัสอาจารย์ผู้สอน :</label>
                    <div class="col-sm-5">
                    <select name="TeacName" class="form-control col-form-label col-form-label-sm" id="inputGroupSelect01" required>
                    <option <?php if($_GET['CosId']){ ?>
    value="<?php echo $resultEdit['Teach_code'] ?>"
<?php  } ?> selected><?php if($_GET['CosId']){ echo $resultEdit['Teach_code']." ".$resultEdit['Teach_Pname']." ".$resultEdit['Teach_Fname']." ".$resultEdit['Teach_Lname']." [ค่าเดิม]";
}else { echo "เลือกอาจารย์";}?> 
</option>
<?php  
$sqlTeacher = "SELECT * FROM `teacher_tb`";
$queryTeacher = $conn->query($sqlTeacher);
while($rowTeacher = $queryTeacher->fetch_assoc()){ ?>
<option value="<?php echo $rowTeacher['Teach_code'] ?>" ><?php echo $rowTeacher['Teach_code'] ." ". $rowTeacher['Teach_Pname']." ".
$rowTeacher['Teach_Fname'] ." ". $rowTeacher['Teach_Lname']?></option>
<?php } ?>
      </select>
                    </div>
                </div>

                                     <!-- คาบเรียน  -->
                                     <div class="form-group">
                    <label for="cosTime"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">คาบเรียน :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="cosTime" name="cosTime" 
                        <?php if($_GET['CosId']){ ?>value="<?php echo $resultEdit['Cos_Time']?>" <?php }
                        else{ ?> <?php } ?> required>
                        <small>เช่น จ(1-4), อ(6-10)</small>
                    </div>
                </div>
                                                     <!-- ห้องเรียน  -->
                                                     <div class="form-group">
                    <label for="cosRoom"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">ห้องเรียน :</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control form-control-sm" id="cosRoom" name="cosRoom" 
                        <?php if($_GET['CosId']){ ?>value="<?php echo $resultEdit['Cos_Room']?>" <?php }
                        else{ ?> <?php } ?> required>
                        
                    </div>
                </div>

                <div class="form-group">
                <select name="cosTerm" class="col-sm-3 col-form-label col-form-label-sm ml-3" id="inputGroupSelect01" required>
                <option <?php if($_GET['CosId']){ ?>
    value="<?php echo $resultEdit['Cos_term'] ?>"
<?php  } ?> selected><?php if($_GET['CosId']){ echo $resultEdit['Cos_term']." [ค่าเดิม]";
}else { echo "เลือกภาคเรียน";}?> 
</option>
        <option value="1/2560">1/2560</option>
        <option value="2/2560">2/2560</option>
        <option value="1/2561">1/2561</option>
        <option value="2/2561">2/2561</option>
        <option value="1/2562">1/2562</option>
        <option value="2/2562">2/2562</option>
        <option value="1/2563">1/2563</option>
        <option value="2/2563">2/2563</option>
      </select>
      
      <?php if($_GET['CosId']){ 
          $_SESSION['EditProgream'] = $_GET['CosId'];?>
<input class="btn btn-sm" type="submit" value="แก้ไขวิชา" name="Edit">
<a class="btn btn-danger btn-sm" href="./ref.php">ยกเลิก</a>
      <?php }else{?>
        <input class="btn btn-sm btn-success" type="submit" value="เพิ่มวิชา" name="add">
        <?php }?>
</div>     
      </form>


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