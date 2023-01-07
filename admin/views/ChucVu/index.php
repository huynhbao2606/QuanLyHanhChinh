<div class="text-center col-10">
    <div class="row">
        <header>
            <h2>Quản Lý Chức Vụ</h2>

        </header>
        <hr>
    <form action="index.php?act=add_cv" method="post">
        <div class="mb-3 row w-75 m-auto">
            <label for="tenChucvu" class="col-sm-2 col-form-label">Tên Chức Vụ</label>
            <div class="col-sm-10">
                <input name="tenChucvu" type="text"  class="form-control" id="tenChucvu" required>
            </div>
        </div>
        <div class="mb-3">
            <input name="luuCV" type="submit" class="btn btn-dark" value="Thêm">
        </div>
    </form>
    </div>
    <hr>
    <div class="row mt-3">
        <?php
        if (isset($_GET['notify'])) {
            echo '<hr>';
            echo '<div class="d-flex justify-content-center mb-3"><h4>Bạn có chắc chắn muốn xóa chức vụ <span class="text-blue">' . $kqOne['chucvu'] . '</span> không ?</h4></div>';
            echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none bg-danger fw-bold rounded text-white " href="index.php?act=del_cv&id=' . $kqOne['macv'] . '" >Xác nhận</a></div>';
            echo '<div class="d-flex justify-content-center mb-3"><a class="text-decoration-none fw-bold rounded bg-dark text-white" href="index.php?act=chucvu" ">Không</a></div>';
            echo '<hr>';
        } ?>
    </div>
    <div class="row">
        <header class="text-start">
            <h2>DANH SÁCH CHỨC VỤ</h2>
        </header>
        <table class="table table-bordered border-dark">
            <tr class="table-dark">
                <th>#</th>
                <th>Tên Chức Vụ</th>
                <th><i class="fa-solid fa-trash"></i></th>
            </tr>
            <?php
            if(isset($kq) && (count($kq) > 0)){
                $i = 1;
                foreach ($kq as $pb){
                    echo '<tr>
                    <td>'.$i.'</td>
                    <td class="text-decoration-none fw-bold link-blue">'.$pb['chucvu'].' </td>
                    <td><a href="index.php?act=del_cv&notify&id='  .$pb['macv'] . ' " class="link-dark"><i class="fa-solid fa-trash"></i></a></td>' .
                        '</tr>';
                    $i++;
                }
            }
            ?>
</div>