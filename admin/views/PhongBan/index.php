<div class="text-center col-10">
    <div class="row">
        <header>
            <h2>Quản Lý Phòng</h2>
            <hr>
        </header>
        <form action="index.php?act=add_pb" method="post">
        <div class="mb-3 row w-75 m-auto">
            <label for="tenPhong" class="col-sm-2 col-form-label">Tên Phòng</label>
            <div class="col-sm-10">
                <input name="tenPhong" type="text"  class="form-control" id="tenPhong" required>
            </div>
        </div>
        <div class="mb-3 row w-75 m-auto">
            <label for="tenVietTat" class="col-sm-2 col-form-label">Tên Viết Tắt</label>
            <div class="col-sm-10">
                <input name="tenVietTat" type="text" class="form-control" id="tenVietTat" required>
            </div>
        </div>
        <div class="mb-3 row w-75 m-auto">
            <label for="ghiChu" class="col-sm-2 col-form-label">Ghi Chú</label>
            <div class="col-sm-10">
                <input name="ghiChu" type="text" class="form-control" id="ghiChu"  required>
            </div>
        </div>
            <input name="luuPB" type="submit" class="btn btn-dark" value="Thêm Phòng">
            <input type="reset" class="btn btn-dark" value="Reset">
        </form>
    </div>
<hr>
    <div class="row mt-3">
                <?php
                if (isset($_GET['notify'])) {
                    echo '<hr>';
                    echo '<div class="d-flex justify-content-center mb-3"><h4>Bạn có chắc chắn muốn xóa phòng <span class="text-blue">' . $kqOne['tenphong'] . '</span> không ?</h4></div>';
                    echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none bg-danger fw-bold rounded text-white " href="index.php?act=del_pb&id=' . $kqOne['maphong'] . '" >Xác nhận</a></div>';
                    echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none fw-bold rounded bg-dark text-white" href="index.php?act=phongban" ">Không</a></div>';
                    echo '<hr>';
                } ?>
    </div>
<div class="row">
    <header class="text-start">
        <h2>DANH SÁCH PHÒNG</h2>
        <hr>
    </header>
    <table class="table table-bordered border-dark" id="tablePB">
        <tr class="table-dark">
            <th>#</th>
            <th>Tên phòng</th>
            <th>Tên viết tắt</th>
            <th>Ghi Chú</th>
            <th><i class="fa-solid fa-pen"></i></th>
            <th><i class="fa-solid fa-trash"></i></th>
        </tr>
<?php
if(isset($kq) && (count($kq) > 0)){
    foreach ($kq as $pb){
        $i = 1;
        echo '<tr>
         <td>'.$i.'</td>
         <td class="text-decoration-none fw-bold link-blue">'.$pb['tenphong'].' </td>
         <td>'.$pb['viettat'].'</td>
         <td>'.$pb['ghichu'].'</td>
         <td><a class="text-decoration-none fw-bold link-dark" href="?act=upd_pb&id='. $pb['maphong'] . ' "><i class="fa-solid fa-pen"></i></a></td>
         <td><a href="index.php?act=del_pb&notify&id='  .$pb['maphong'] . '" class="link-dark"><i class="fa-solid fa-trash"></i></a></td>' .
         '</tr>';
        $i++;
    }
}
?>
    </table>
    </div>
</div>