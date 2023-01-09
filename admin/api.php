<?php
include "../models/PhongBan_class.php";
$pb = new funcPB();
if(isset($_POST['tenPhong'])){
    $tenP = $_POST['tenPhong'];
    $tenVT = $_POST['tenVietTat'];
    $ghiChu = $_POST['ghiChu'];
    $pb ->insert_pb($tenP,$tenVT,$ghiChu);

    $i = count($pb ->all_pb());
    $maPhong = $pb->getNextID();
    echo '<tr>
         <td>'.$i.'</td>
         <td class="text-decoration-none fw-bold link-blue">'.$tenP.' </td>
         <td>'.$tenVT.'</td>
         <td>'.$ghiChu.'</td>
         <td><a class="text-decoration-none fw-bold link-dark" href="?act=upd_pb&id='. $maPhong['NEXT_ID']-2 . ' "><i class="fa-solid fa-pen"></i></a></td>
         <td><a href="index.php?act=del_pb&notify&id='  .$maPhong['NEXT_ID']-2 . '" class="link-dark"><i class="fa-solid fa-trash"></i></a></td>' .
        '</tr>';

}
