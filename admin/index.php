<?php
include "../models/phongban.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Hành Chính</title>
    <script src="https://kit.fontawesome.com/1e7fe5f742.js" crossorigin="anonymous"></script>
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../scss/style.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container-fluid">
    <div class="row  text-bg-dark bg-gradient ">
        <?php include_once 'view/header.php';?>
    </div>
    <hr>
        <div class="row">
            <?php include_once 'view/sideleft.php';?>
            <?php
            if(isset($_GET['act'])){
                switch ($_GET['act']){
                    case 'phongban':
                        $pb = new phongban();
                        $kq = $pb ->all_pb();
                        include "view/phongban.php";
                        break;
                    case'add_pb':
                        $pb = new phongban();
                        if(isset($_POST['luuPB'])){
                            $tenP = $_POST['tenPhong'];
                            $tenVT = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb ->insert_pb($tenP,$tenVT,$ghiChu);
                        }
                        $kq = $pb ->all_pb();
                        include "view/phongban.php";
                        break;
                    case 'del_pb':
                        $pb = new phongban();
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $pb->del_pb($id);
                        }
                        $kq =  $pb -> all_pb();
                        include "view/phongban.php";
                        break;
                    case'upd_pb':
                        $pb = new phongban();
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $kqOne = $pb->one_pb($id);
                            $kq = $pb->all_pb();
                            include 'view/phongban_upd.php';
                        }
                        if (isset($_POST['maPhong'])) {
                            $maPhong = $_POST['maPhong'];
                            $tenPhong = $_POST['tenPhong'];
                            $vietTat = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb->upd_pb($tenPhong, $vietTat, $ghiChu,$maPhong);
                            $kq = $pb->all_pb();
                            include 'view/phongban.php';
                        }
                        break;
                    case 'chucvu':
                        include "view/chucvu.php";
                        break;
                    case 'nhanvien':
                        include "view/nhanvien.php";
                        break;
                    case 'ngayphep':
                        include "view/ngayphep.php";
                        break;
                    case 'phieunghi':
                        include "view/phieunghi.php";
                        break;
                    case 'thoat':
                        break;
                    default:
                        include "view/trangchu.php";
                        break;
                }
            }else{
                include "view/trangchu.php";
            }



            ?>
        </div>
    <hr>
    <div class="row text-bg-dark bg-gradient">
        <?php include 'view/footer.php'; ?>
    </div>
</div>
</body>
</html>
