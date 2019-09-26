<?php
session_start();
include_once('../../model/connect.php');
$sql = "SELECT * FROM `student_tb` ";
$query = $conn->query($sql);
error_reporting(0);
$sqlCourseName = "SELECT * FROM `coursename_tb` ";
$queryCourseName = $conn->query($sqlCourseName);
// $resultCourseName = $queryCourseName->FETCH_ASSOC();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>จัดการลงทะเบียน</title>

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
                    <a href="../managerProgram/ManagerProgram.php">จัดการแผนการเรียน</a>
                </li>
                <li>
                    <a href="">ลงทะเบียน</a>
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
            <h3>จัดการลงทะเบียน</h3>
            <form class="form-inline">
            <div class="form-group mr-2 mb-2">
                <label for="inputPassword2" class="sr-only">Password</label>
                <input type="password" class="form-control form-control-sm" id="inputPassword2" placeholder="รหัส หรือ หมู่เรียน">
              </div>
              <button type="submit" class="btn btn-secondary btn-sm mb-2">ค้นหา</button>
            </form>


            <script language="JavaScript">
	function ClickCheckAll(vol)
	{
		for(var i=2;i<=document.frmMain.hdnCount.value;i++)
		{
            console.log(i);
            
			if(vol.checked == true)
			{
				eval("document.frmMain.Chk"+i+".checked=true");
			}
			else
			{
				eval("document.frmMain.Chk"+i+".checked=false");
			}
		}
	}
</script>


<form action="../../control/register/AddEditRegister.php" method="post" name="frmMain" id="frmMain">

<div class="form-group">
        <select name="CosCode" class="form-control-sm" required>
                <option value="">เลือกแผนการเรียน</option>
<?php while($rowCsName = $queryCourseName->FETCH_ASSOC()){ ?>
                <option value="<?php echo $rowCsName['Cos_code'] ?>"><?php echo $rowCsName['Cos_name'] ?></option>
<?php } ?>
              </select>
              <button class="btn btn-sm btn-success">+ เพิ่ม/แก้ไข</button>
</div>

<?php if($_GET['susccess'] == 1){ ?>
    <div class="alert alert-success" role="alert">
  สำเร็จ
</div>

<?php }else if($_GET['susccess'] == 2) { ?>
    <div class="alert alert-danger" role="alert">
  มีบางอย่างผิดพลาด กรุณาตรวจสอบ
</div> <?php } ?>


            <table class="table table-bordered mt-3 ">
                    <thead>
                      <tr>
                      <td width="34"><div align="center">
        <input name="CheckAll" type="checkbox" id="CheckAll" onClick="ClickCheckAll(this);">
      </div></td>
                        <th scope="col">รหัส</th>
                        <th scope="col">ชื่อ - นามสกุล</th>
                        <th scope="col">แผนการเรียน</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; while($row = $query->FETCH_ASSOC()) {
                             $i = $i+1; 
                             $sqlNameCourse = "SELECT * FROM `register_tb`
                    INNER JOIN coursename_tb
                    ON register_tb.cos_code = coursename_tb.Cos_code
                    WHERE `std_code` = '".$row['std_code']."' ";
                    $queryNameCourse = $conn->query($sqlNameCourse);
                    $resultNameCourse = $queryNameCourse->FETCH_ASSOC();
                             ?>
                        <tr>
                        <td><div align="center">
                            <input name="Chk<?php echo $i; ?>" type="checkbox" id="Chk1" value="<?php echo $row['std_code']; ?>">
                        </div></td>
                        <td scope="row"><?php echo $row['std_code'] ?></td>
                        <td><?php echo $row['std_name']?></td>
                        <td><?php echo $resultNameCourse['Cos_name'] ?></td>
                      </tr>
                      
                        <?php  } ?>
                    </tbody>
                  </table>
                  <input type="hidden" name="hdnCount" value="<?php echo $i ?>">
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