<div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item   <?php echo !isset($_GET['act']) ? 'active' : '';?> " href="index.php"><i class="fa-solid fa-house-user"></i> Trang Chủ</a>
        <a class="list-group-item   <?php echo isset($_GET['act'] ) && $_GET['act'] == 'phongban'  ? 'active' : false ;?>" href="index.php?act=phongban"><i class="fa-solid fa-building-user"></i> Phòng Ban</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'chucvu'  ? 'active' : false ;?>"  href="index.php?act=chucvu"><i class="fa-solid fa-user-check"></i> Chức Vụ</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'nhanvien'  ? 'active' : false ;?>"  href="index.php?act=nhanvien"><i class="fa-solid fa-user"></i> Nhân Viên</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'ngayphep'  ? 'active' : false ;?>"  href="index.php?act=ngayphep"><i class="fa-regular fa-calendar"></i> Ngày Phép</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'phieunghi'  ? 'active' : false ;?>"  href="index.php?act=phieunghi"><i class="fa-solid fa-calendar"></i> Phiếu Nghỉ Phép</a>
        <a class="list-group-item "  href="index.php?act=thoat"><i class="fa-solid fa-right-from-bracket"></i> Thoát</a>
    </div>
</div>



