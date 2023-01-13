<?php
if (isset($_GET['show_np']))
    echo '<div class="row mt-3">';
echo '<hr>';
echo '<div class="d-flex justify-content-center mb-3"><h4>Bạn có chắc chắn muốn xóa nhân viên <span class="text-blue">' . $kqOne['tennv'] . '</span> không ?</h4></div>';
echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none bg-danger fw-bold rounded text-white " href="index.php?act=del_nv&id=' . $kqOne['manv'] . '" >Xác nhận</a></div>';
echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none fw-bold rounded bg-dark text-white" href="index.php?act=nhanvien" ">Không</a></div>';
echo '</div>';