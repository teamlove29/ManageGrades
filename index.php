<?php 
session_start();
include('./model/connect.php');
error_reporting(0);
if($_SESSION['Type_id'] == 2){
    $sql ="SELECT * FROM `teacher_tb` WHERE `tc_code` = '".$_SESSION['id']."'";
    $query = $conn->query($sql);
    $result = $query -> FETCH_ASSOC();
    $_SESSION['name'] = $result['tc_name'];
}
else{
    $_SESSION['name'] = 'Admin';
}

$_SESSION['decode'] = '';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./style/Style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>เข้าสู่ระบบ</title>
</head>

<body class="setfont">
    <div class="img-team">
        <div class="row">

            <?php if($_SESSION['id'] == ""){

             ?>
            <div class="right-team mm">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
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
                        <h5 class="card-title">เข้าสู่ระบบ</h5>

                        <form name="login" method = "POST" action = "./control/login/CheckLogin.php">
                            <div class="form-group">
                              <label for="txtuser">ชื่อผู้ใช้งาน</label>
                            
                            
                            <!-- check pattern between admin and teacher -->
                              <input type="text" name="txtuser" id="txtuser" class="form-control" placeholder="Username"   
                              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}"title="Must contain at least 1 Capital letter, 1 small letter and 5 to 20 characters" required autofocus>


     <label for="verified" class=' col-form-label col-md-15' style="color:Tomato;">* Must contain at least one number, one uppercase, lowercase letter and at least 8 or more characters</label>
                            </div>
                            <div class="form-group">
                              <label for="txtPass">รหัสผ่าน</label>
                              <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" 
                              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,20}"title="Must contain at least 1 Capital letter, 1 small letter and 5 to 20 characters" required autofocus>
                              <input type="checkbox" onclick="myShowPLogin()">Show Password
                            </div>
                            <button type="submit" name="btnlogin" class="btn btn-primary btn-sm btn-block">เข้าสู่ระบบ</button>
                            <a href = "./view/forgetPass/ForgetPass.php" type="text" class="btn btn-secondary btn-sm btn-block">ลืมรหัสผ่าน ?</a>
                          </form>
                    </div>
                </div>
            </div>
<?php } else { ?>

    <div class="right-team mm">
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
                <h5 class="card-title">ยินดีต้อนรับ</h5>
                <form name="login" method = "POST" action = "control/login/Check_login.php">
                    <div class="form-group">
                      <label>คุณ <?php echo $_SESSION['name']; ?></label>
                    </div>
                    <a href = "./view/main/Main.php" type="text" class="btn btn-primary btn-sm btn-block">ดำเนินการต่อ</a>
                    <a href = "./control/logout/Logout.php" type="text" class="btn btn-danger btn-sm btn-block">ออกจากระบบ</a>
                  </form>
            </div>
        </div>
    </div>
    <?php } ?>

        </div>
    </div>
   


</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


<!-- SCRIPTS -->

<script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./securitysc"></script>


				

<!-- Password Visibilty-->
<script>
function myShowPLogin() {
  var showpass = document.getElementById("txtPass");
  if (showpass.type === "password") {
    showpass.type = "text";
  } else {
    showpass.type = "password";
  }
}
</script>


</html>