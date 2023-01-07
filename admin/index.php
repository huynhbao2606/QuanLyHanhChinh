<?php

include "../models/PhongBan_class.php";
include "../models/NhanVien_class.php";
include "../models/ChucVu_class.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Hành Chính</title>
    <script src="https://kit.fontawesome.com/1e7fe5f742.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="../scss/style.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body>
<div class="container-fluid" >
    <div class="row text-bg-dark bg-gradient ">
        <?php include_once 'views/Layout/header.php';?>
    </div>
    <hr>
        <div class="row">
            <?php include_once 'views/Layout/sidebar.php';?>
            <?php
            if(isset($_GET['act'])){
                switch ($_GET['act']){
                    case 'phongban':
                        $pb = new funcPB();
                        $kq = $pb ->all_pb();
                        include "views/PhongBan/index.php";
                        break;
                    case'add_pb':
                        $pb = new funcPB();
                        if(isset($_POST['luuPB'])){
                            $tenP = $_POST['tenPhong'];
                            $tenVT = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb ->insert_pb($tenP,$tenVT,$ghiChu);
                        }
                        $kq = $pb ->all_pb();
                        include "views/PhongBan/index.php";
                        break;
                    case 'del_pb':
                        $pb = new funcPB();
                        if (isset($_GET['notify'])) {
                            $id = $_GET['id'];
                            $kqOne = $pb->one_pb($id);
                            $kq = $pb->all_pb();
                            include 'views/PhongBan/index.php';
                        }
                        if(isset($_GET['id']) && !isset($_GET['notify'])){
                            $id = $_GET['id'];
                            $pb->del_pb($id);
                            $kq =  $pb -> all_pb();
                            include "views/PhongBan/index.php";
                        }
                        break;
                    case'upd_pb':
                        $pb = new funcPB();
                        if (isset($_GET['id'])){
                            $id = $_GET['id'];
                            $kqOne = $pb->one_pb($id);
                            $kq = $pb->all_pb();
                            include 'views/PhongBan/PB_Update.php';
                        }
                        if (isset($_POST['maPhong'])) {
                            $maPhong = $_POST['maPhong'];
                            $tenPhong = $_POST['tenPhong'];
                            $vietTat = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb->upd_pb($tenPhong, $vietTat, $ghiChu,$maPhong);
                            $kq = $pb->all_pb();
                            include 'views/PhongBan/index.php';
                        }
                        break;
                    case 'chucvu':
                        $cv = new funcCV();
                        $kq = $cv ->All_CV();
                        include "views/ChucVu/index.php";
                        break;
                    case'add_cv':
                        $cv = new funcCV();
                        if(isset($_POST['luuCV'])){
                            $chucVu = $_POST['tenChucvu'];
                            $cv ->Insert_CV($chucVu);
                        }
                        $kq = $cv ->All_CV();
                        include "views/ChucVu/index.php";
                        break;
                    case'del_cv':
                        $cv = new funcCV();
                        if (isset($_GET['notify'])) {
                            $id = $_GET['id'];
                            $kqOne = $cv->One_CV($id);
                            $kq = $cv->All_CV();
                            include 'views/ChucVu/index.php';
                        }
                        if(isset($_GET['id']) && !isset($_GET['notify'])){
                            $id = $_GET['id'];
                            $cv->del_CV($id);
                            $kq =  $cv -> All_CV();
                            include "views/ChucVu/index.php";
                        }
                        break;
                    case 'nhanvien':
                        $nv = new funcNV();
                        $kq = $nv ->all_nv();
                        include "views/NhanVien/index.php";
                        break;
                    case 'add_nv':
                        $nv = new funcNV();
                        if(isset($_POST['luuNV'])){
                            $tenNV = $_POST['tenNv'];
                            $taiKhoan = $_POST['taiKhoan'];
                            $matKhau = $_POST['matKhau'];
                            $gioiTinh = $_POST['gioiTinh'];
                            $ngaySinh = $_POST['ngaySinh'];
                            $maPhong = $_POST['maPhong'];
                            $chucVu = $_POST['chucVu'];
                            $nv ->insert_nv($tenNV,$taiKhoan,$matKhau,$maPhong,$gioiTinh,$ngaySinh,$chucVu);
                        }
                        $kq = $nv ->all_nv();
                        include "views/NhanVien/index.php";
                        break;
                    case'del_nv':
                        $nv = new funcNV();
                        if (isset($_GET['notify'])) {
                            $id = $_GET['id'];
                            $kqOne = $nv->one_nv($id);
                            $kq = $nv->all_nv();
                            include 'views/NhanVien/index.php';
                        }
                        if(isset($_GET['id']) && !isset($_GET['notify'])){
                            $id = $_GET['id'];
                            $nv->del_nv($id);
                            $kq =  $nv -> all_nv();
                            include "views/NhanVien/index.php";
                        }
                        break;
                    case'upd_nv':
                        $nv = new funcNV();
                        if (isset($_GET['id'])){
                            $id = $_GET['id'];
                            $kqOne = $nv->one_nv($id);
                            $kq = $nv->all_nv();
                            include 'views/NhanVien/NV_update.php';
                        }
                        if (isset($_POST['maNV'])) {
                            $maNV = $_POST['maNV'];
                            $tenNV = $_POST['tenNV'];
                            $taiKhoan = $_POST['taiKhoan'];
                            $matKhau = $_POST['matKhau'];
                            $gioiTinh = $_POST['gioiTinh'];
                            $ngaySinh = $_POST['ngaySinh'];
                            $maPhong = $_POST['maPhong'];
                            $chucVu = $_POST['chucVu'];
                            $nv->update_nv($maNV,$tenNV,$taiKhoan,$matKhau,$maPhong,$gioiTinh,$ngaySinh,$chucVu);
                            $kq = $nv->all_nv();
                            include 'views/NhanVien/index.php';
                        }
                        break;
                    case 'ngayphep':
                        include "views/ngayphep.php";
                        break;
                    case 'phieunghi':
                        include "views/phieunghi.php";
                        break;
                    default:
                        include "views/Layout/home.php";
                        break;
                }
            }else{
                include "views/Layout/home.php";
            }
            ?>
        </div>
    <hr>
    <div class="row text-bg-dark bg-gradient">
        <?php include 'views/Layout/footer.php'; ?>
    </div>
</div>
</body>
</html>