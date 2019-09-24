<?php
session_start();
error_reporting(0);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/Style.css">
    <title>แสดงรหัสผ่าน</title>
  </head>




  <body class="setfont">
    <div class="img-team">
        <div class="row">
      
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
  ไม่พบข้อมูลกรุณาลองอีกครั้ง
</div> <?php } ?>
<!-- end alert  -->
                        <h5 class="card-title text-center">รหัสผ่านของคุณคือ</h5>
                            <div class="form-group">
                              <input type="text" name="txtemail" id="txtemail" class="form-control text-center" value="<?php echo $_SESSION['decode']; ?>" readonly>
                            </div>
                            <a href = "../../index.php" type="text" class="btn btn-secondary btn-sm btn-block">กลับหน้าหลัก ?</a>
                    </div>
                </div>
            </div> </div> </div>






            
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<p class="mt-5 mb-3 text-muted">&copy; Manager By.LPRU Software engineer 2017-2019</p>
</html>

