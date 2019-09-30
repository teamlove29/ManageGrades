<?php
session_start();
include_once('../../model/connect.php');
error_reporting(0);

$_SESSION['showprogram'] = $_GET['ID'];
$_SESSION['EditProgream'] = $_GET['CosId'];
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
$sql = "SELECT DISTINCT course_tb.Cos_id,course_tb.Cos_term,course_tb.Sub_Code, subject_tb.Sub_Name, subject_tb.Sub_Credit,
				course_tb.Teach_code,teacher_tb.tc_name
                FROM `course_tb` 
                INNER JOIN subject_tb
                ON course_tb.Sub_Code = subject_tb.Sub_code
                INNER JOIN teacher_tb
                ON course_tb.Teach_code = teacher_tb.tc_code
                WHERE Cos_id = '".$_GET['CosId']."'";
$query = $conn->query($sql);
$result = $query->FETCH_ASSOC();
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
            <a class="btn btn-sm btn-secondary m-1" href="./Program.php"> < กลับหน้าเดิม</a>
            <h3>จัดการวิชาแผนการเรียน</h3> 


<form action="../../control/program/AddProgram.php" method="POST">
   
                      


<?php if($_GET['susccess'] == 1){ ?>
    <div class="alert alert-success" role="alert">
  สำเร็จ
</div>

<?php }else if($_GET['susccess'] == 2) { ?>
    <div class="alert alert-danger" role="alert">
  มีบางอย่างผิดพลาด กรุณาตรวจสอบ
</div> <?php } ?>



  <!-- เลือกวิชา  -->
  <div class="form-group">
                    <label for="subCode"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">เลือกวิชา :</label>
                    <div class="col-sm-5">
                    <select name="subCode" class="form-control col-form-label col-form-label-sm" id="inputGroupSelect01" required>
<option <?php if($_GET['CosId']){ ?>
    value="<?php echo $result['Sub_Code'] ?>"
<?php  } ?> selected><?php if($_GET['CosId']){ echo $result['Sub_Code']." ".$result['Sub_Name']." [ค่าเดิม]";
}else { echo "เลือกวิชา";}?> 
</option>

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
    value="<?php echo $result['Teach_code'] ?>"
<?php  } ?> selected><?php if($_GET['CosId']){ echo $result['tc_code']." ".$result['tc_name']." [ค่าเดิม]";
}else { echo "เลือกอาจารย์";}?> 
</option>

<?php  
$sqlTeacher = "SELECT * FROM `teacher_tb`";
$queryTeacher = $conn->query($sqlTeacher);
while($rowTeacher = $queryTeacher->fetch_assoc()){ ?>
<option value="<?php echo $rowTeacher['tc_code'] ?>" ><?php echo $rowTeacher['tc_code'] ." ". $rowTeacher['tc_name'];?></option>
<?php } ?>
      </select>
                    </div>
                </div>

                
                                     <!-- ภาคเรียน  -->
                                     <div class="form-group">
                    <label for="term"
                        class="col-sm-4 col-form-label col-form-label-sm font-weight-bold">ภาคเรียน :</label>
                    <div class="ml-1 col-sm-8 row">
                    <select name="term" id="term" class="form-control col-form-label col-form-label-sm col-3 mr-2" required>
                    <option <?php if($_GET['CosId']){ ?>
    value="<?php echo substr($result['Cos_term'],-7,1); ?>"
<?php  } ?> selected><?php if($_GET['CosId']){ echo substr($result['Cos_term'],-7,1)." [ค่าเดิม]";
}else { echo "ภาคเรียน";}?> 
</option>
                    <option>1</option>
                    <option>2</option>
                    </select>
                       
                    <input name="year" id="year" class="form-control col-form-label col-form-label-sm col-5 mr-2" placeholder="ปีการศึกษา" 
                    value="<?php if($_GET['CosId']){ echo substr($result['Cos_term'],-4,4);}else { echo "";}?>" required>

                        <!-- ปุ่ม -->
                        <?php if($_GET['CosId']){ ?>
<input class="my-auto btn btn-sm mr-2" type="submit" value="แก้ไขวิชา" name="Edit">
<a class="my-auto btn btn-danger btn-sm" href="../../control/program/ref.php">ยกเลิก</a>
      <?php }else{?>
        <input class="my-auto btn btn-sm btn-success" type="submit" value="เพิ่มวิชา" name="add">
        <?php }?>
        <!-- End ปุ่ม -->
                    </div>
                </div>
                </form>
<hr class="mt-5">
<div class="form-group row">
<div class="col-3 text-right my-auto">
<label for="search_text">ค้นหา</label>
</div>
<input name="search_text" id="search_text" type="text" class="form-control col-form-label col-form-label-sm col-6 mr-2" 
        placeholder="ภาคเรียน/ปีการศึกษา - รหัสวิชา - ชื่อรายวิชา - อาจารย์ผู้สอน"> 
        
</div>


   

      <div id="result"></div>




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
            <!-- ajax  -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').toggleClass('active');
                });
            });
        </script>

<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"../../model/fetchsub.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>

</body>

</html>