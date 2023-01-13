<div class="text-center col-10">
    <div class="row">
        <header>
            <h2>Quản Lý Nhân Viên</h2>
            <hr>
        </header>
        <form action="index.php?act=add_nv" method="post" enctype="multipart/form-data">
            <div class="mb-3 row w-50 m-auto">
                <label for="tenNv" class="col-sm-2 col-form-label">Tên Nhân Viên</label>
                <div class="col-sm-10">
                    <input name="tenNv" type="text"  class="form-control" id="tenNv" required>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="taiKhoan" class="col-sm-2 col-form-label">Tài Khoản</label>
                <div class="col-sm-10">
                    <input name="taiKhoan" type="text" class="form-control"  id="taiKhoan" required>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="matKhau" class="col-sm-2 col-form-label">Mật Khẩu</label>
                <div class="col-sm-10">
                    <input name="matKhau" type="text" class="form-control" id="matKhau" required>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="gioiTinh" class="col-sm-2 col-form-label">Giới Tính</label>
                <div class="col-sm-10">
                    <select class="form-select w-25 " name="gioiTinh" id="gioiTinh">
                        <option selected value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="ngaySinh" class="col-sm-2 col-form-label">Ngày Sinh</label>
                <div class="col-sm-10">
                    <div class="w-25">
                        <input name="ngaySinh" type="date" class="form-control" id="ngaySinh" required>
                    </div>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="phongBan" class="col-sm-2 col-form-label">Phòng Ban</label>
                <div class="col-sm-10">
                    <select class="form-select shadow-sm w-25" name="maPhong" id="phongBan">
                        <?php
                        $pb = new funcPB();
                        $kqpb = $pb->all_pb();
                        foreach ($kqpb as $pb) {
                            echo '<option value="' . $pb['maphong'] . '" >' . $pb['tenphong'] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="chucVu" class="col-sm-2 col-form-label">Chức Vụ</label>
                <div class="col-sm-10">
                    <select class="form-select w-25 " name="chucVu" id="chucVu">
                        <?php
                        $cv = new funcCV();
                        $kqcv = $cv->All_CV();
                        foreach ($kqcv as $cv) {
                            echo '<option value="' . $cv['macv'] . '" >' . $cv['chucvu'] .'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3 row w-50 m-auto">
                <label for="hinhAnh" class="col-sm-2 col-form-label">Hình Ảnh</label>
                <div class="col-sm-10">
                    <div class="w-50">
                        <input name="hinhAnh" value="Thêm Hình Ảnh..." type="file" class="form-control" id="hinhAnh">
                    </div>
                </div>
            </div>
                <input name="luuNV" type="submit" class="btn btn-dark" value="Thêm Nhân Viên">
                <input type="reset" class="btn btn-dark" value="Reset">
        </form>
    </div>
        <?php
        if (isset($_GET['notify'])) {
            echo '<div class="row mt-3">';
            echo '<hr>';
            echo '<div class="d-flex justify-content-center mb-3"><h4>Bạn có chắc chắn muốn xóa nhân viên <span class="text-blue">' . $kqOne['tennv'] . '</span> không ?</h4></div>';
            echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none bg-danger fw-bold rounded text-white " href="index.php?act=del_nv&id=' . $kqOne['manv'] . '" >Xác nhận</a></div>';
            echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none fw-bold rounded bg-dark text-white" href="index.php?act=nhanvien" ">Không</a></div>';
           echo '</div>';
        } ?>
    <hr>
    <div class="row mt-3">
        <header class="text-start">
            <h2>DANH SÁCH NHÂN VIÊN</h2>
            <hr>
        </header>
        <table class="table table-bordered border-dark">
            <tr class="table-dark">
                <th>STT</th>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Hình</th>
                <th>Tài Khoản</th>
                <th>Giới Tính</th>
                <th>Ngày Sinh</th>
                <th>Tên Phòng</th>
                <th>Chức Vụ</th>
                <th><i class="fa-solid fa-pen"></i></th>
                <th><i class="fa-solid fa-trash"></i></th>
            </tr>
            <?php
            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $nv){
                    echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$nv['manv'].'</td>
                    <td class="fw-bold text-blue">'.$nv['tennv'].'</td> 
                    <td><img src="../files/'.$nv['hinh'].'" alt="Lỗi" width="30" height="30""></td>
                    <td>'.$nv['username'].'</td>';
                    if($nv['gioitinh'] == 1){
                    echo '<td>Nam</td>';
                    }else
                        echo '<td>Nữ</td>';
                    echo  '<td>'.date("d-m-Y",strtotime($nv['ngaysinh'])).'</td>
                    <td>'.$nv['tenphong'].'</td>
                    <td>'.$nv['chucvu'].'</td>
                    <td><a class="text-decoration-none fw-bold link-dark" href="?act=upd_nv&id='. $nv['manv'] . ' "><i class="fa-solid fa-pen"></i></a></td>
                    <td><a href="index.php?act=del_nv&notify&id='  .$nv['manv'] . ' " class="link-dark"><i class="fa-solid fa-trash"></i></a></td>';
                    $i++;
                }

            }
            ?>
        </table>
    </div>