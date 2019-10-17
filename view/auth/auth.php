<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>authPage</title>
</head>
<body>

<?php  
if (isset($_POST['submit'])){

    include_once('../../model/connect.php');
    $check = $_POST['idcard'];

    //check username from 0-11 : from 60122660130yada to 60122660130
    $checkCodeStr = substr($_SESSION['id'],0,5);
    $sql = "SELECT * FROM `teacher_tb` WHERE tc_code = '".$checkCodeStr."'";
    $query = $conn->query($sql);
    $result = $query->fetch_assoc();
    $checkstr = substr($result['tc_idCard'],9);

    if($check == $checkstr && $result['tc_code'] == $checkCodeStr){

        header('location:../main/Main.php');

    }
    else {
        session_destroy();
        header( "location: ../../index.php?susccess=2");
      
    }
}   

?>


<div class="container mt-5">
<div class="row">
    <div class="col-xl-5 mx-auto">
    <div class="card">
    <form action="" method='POST' >
    <div class="card-header text-center">Authentication</div>
    <div class="card-body">
    <div class="form-group row ">
    <label for="idcard" class=' col-form-label col-sm-7'>กรอกรหัสบัตรประชาชน 4 ตัวท้าย</label>
    <div class="col-sm-5">
    <input type="text" class='form-control  ' id='idcard' name='idcard' pattern="^[0-9].{3}" title="Must contain 4 characters only" required autofocus>
    </div>
    </div>
    
</div>


</div>
<input type="submit" name='submit' class='btn btn-success col-3 m-auto'   value='เข้าสู่ระบบ'>
</form>
</div>
</div>    
</div>
</div>
    

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../securitysc"></script>
</body>
</html>