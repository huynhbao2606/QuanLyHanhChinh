<div class="text-center col-10">
    <div class="row">
        <header>
            <h2>Cập Nhật Phòng</h2>
            <hr>
        </header>
        <form action="index.php?act=upd_pb" method="post">
            <div class="mb-3 row w-75 m-auto">
                <label for="tenPhong" class="col-sm-2 col-form-label">Tên Phòng</label>
                <div class="col-sm-10">
                    <input name="tenPhong" type="text"  class="form-control" id="tenPhong" value="<?=$kqOne['tenphong'];?>" required>
                </div>
            </div>
            <div class="mb-3 row w-75 m-auto">
                <label for="tenVietTat" class="col-sm-2 col-form-label">Tên Viết Tắt</label>
                <div class="col-sm-10">
                    <input name="tenVietTat" type="text" class="form-control" id="tenVietTat" value="<?=$kqOne['viettat'];?>" required>
                </div>
            </div>
            <div class="mb-3 row w-75 m-auto">
                <label for="ghiChu" class="col-sm-2 col-form-label">Ghi Chú</label>
                <div class="col-sm-10">
                    <input name="ghiChu" type="text" class="form-control" id="ghiChu" value="<?=$kqOne['ghichu'];?>" required>
                </div>
            </div>
            <input type="hidden" name="maPhong" value="<?=$kqOne['maphong'];?>">
            <input name="update" type="submit" class="btn btn-dark" value="Cập Nhật">
            <input type="reset" class="btn btn-dark" value="Reset">
        </form>
    </div>
    <hr>
    <div class="row">
    </div>
    <hr>
    <div class="row">
        <header class="text-start">
            <h2>DANH SÁCH PHÒNG</h2>
            <hr>
        </header>
        <table class="table table-bordered border-dark">
            <tr class="table-dark">
                <th>#</th>
                <th>Tên phòng</th>
                <th>Tên viết tắt</th>
                <th>Ghi Chú</th>
                <th><i class="fa-solid fa-pen"></i></th>
                <th><i class="fa-solid fa-trash"></i></th>
            </tr>
            <?php
            if(isset($kq) && (count($kq) > 1)){
                $i = 1;
                foreach ($kq as $pb){
                    echo '<tr>
         <td>'.$i.'</td>
         <td class="text-decoration-none fw-bold link-blue">'.$pb['tenphong'].' </td>
         <td>'.$pb['viettat'].'</td>
         <td>'.$pb['ghichu'].'</td>
         <td><a class="text-decoration-none fw-bold link-dark" href="?act=upd_pb&id='. $pb['maphong'] . ' "><i class="fa-solid fa-pen"></i></a></td>
         <td><a href="index.php?act=del_pb&notify&id='  .$pb['maphong'] . '" class="link-dark"><i class="fa-solid fa-trash"></i></a></td>' . '</tr>';
                    $i++;
                }
            }
            ?>
        </table>
    </div>
</div>