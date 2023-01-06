<?php
require 'models/register.php';
$register = new register();
if(isset($_POST["register"])){
   $result = $register -> insertUser($_POST['username'],$_POST['password'],$_POST['email']);
   if($result){
       $loginSuc = 'Đăng Ký Thành Công';
   }else{
       $loginErr = 'Đăng Ký Thật Bại';
   }
   }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black " style="border-radius: 25px; ">
                    <div class="card-body p-md-5 ">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <header class="d-flex justify-content-center h1 fw-bold">
                                    Quản Lý Hành Chính
                                </header>
                                <p class="text-center h2 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng Ký Tài Khoản</p>
                                <form action="" method="post" class="mx-1 mx-md-4 ">
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label fw-bold" for="username">Tài Khoản</label>
                                            <input type="text" name="username" id="username" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label fw-bold" for="password">Mật Khẩu</label>
                                            <input type="password" name="password" id="password" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label fw-bold" for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php
                                        if (isset($loginErr)) {
                                            echo '<div class="text-danger mt-3">';
                                            echo '<h6> <i class="fa-duotone fa-circle-xmark"></i> ' . $loginErr . '</h6>';
                                            echo '</div>';
                                        }elseif (isset($loginSuc)){
                                            echo '<div class="text-danger mt-3">';
                                            echo '<h6> <i class="fa-duotone fa-circle-xmark"></i> ' . $loginSuc . '</h6>';
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <input type="submit" value="Đăng Ký" class="btn btn-dark btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                    </div>
                                    <p class="small fw-bold d-flex justify-content-center mt-2 pt-1 mb-0">Quay Lại Đăng Nhập?<a href="login.php" class="link-danger">Quay Lại</a></p>
                                </form>
                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                     class="img-fluid" alt="Sample image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>