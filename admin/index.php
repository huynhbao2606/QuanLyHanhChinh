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
                        include "../models/phongban.php";
                        $pb = new phongban();
                        $kq = $pb ->all_dp();
                        include "view/phongban.php";
                        break;
                    case 'del_pb':
                        include "../models/phongban.php";
                        $pb = new phongban();
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $pb->del_pb($id);
                        }
                        $kq =  $pb -> all_dp();
                        include "view/phongban.php";
                        break;
                    case'upd_pb':
                        include "../models/phongban.php";
                        $pb = new phongban();
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $kqone = $pb -> one_dp($id);
                        }
                        if(isset($_POST['capNhat'])){
                            $id = $_POST['maphong'];
                            $tenp = $_POST['tenPhong'];
                            $tenVT = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb ->upd_pb($tenp,$tenVT,$ghiChu,$id);
                        }
                        $kq = $pb ->all_dp();
                        include "view/phongban_upd.php";
                        break;
                    case'insert_pb':
                        include "../models/phongban.php";
                        $pb = new phongban();
                        if(isset($_POST['luuPB'])){
                            $tenp = $_POST['tenPhong'];
                            $tenVT = $_POST['tenVietTat'];
                            $ghiChu = $_POST['ghiChu'];
                            $pb ->insert_pb($tenp,$tenVT,$ghiChu);
                        }
                        $kq = $pb ->all_dp();
                        include "view/phongban.php";

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