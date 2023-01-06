<div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item <?php echo !isset($_GET['act']) ? 'active' : '';?> " href="?"><i class="fa-solid fa-house-user"></i> Trang Chủ</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'funcPB'  ? 'active' : false ;?>" href="?act=phongBan"><i class="fa-solid fa-building-user"></i> Phòng Ban</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'chucvu'  ? 'active' : false ;?>"  href="?act=chucvu"><i class="fa-solid fa-user-check"></i> Chức Vụ</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'nhanvien'  ? 'active' : false ;?>"  href="?act=nhanvien"><i class="fa-solid fa-user"></i> Nhân Viên</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'ngayphep'  ? 'active' : false ;?>"  href="?act=ngayphep"><i class="fa-regular fa-calendar"></i> Ngày Phép</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'phieunghi'  ? 'active' : false ;?>"  href="?act=phieunghi"><i class="fa-solid fa-calendar"></i> Phiếu Nghỉ Phép</a>
        <a class="list-group-item <?php echo isset($_GET['act'] ) && $_GET['act'] == 'logout'  ? 'active' : false ;?>" href="?act=logout"><i class="fa-solid fa-right-from-bracket"></i> Thoát</a>
    </div>
    <hr>
    <div style="width:100%;height:0;padding-bottom:83%;position:relative;">
        <img src="https://64.media.tumblr.com/tumblr_lm5hpaepoV1qf8l3vo1_400.gif" alt="this slowpoke moves"  width="250" />
    </div>
</div>



