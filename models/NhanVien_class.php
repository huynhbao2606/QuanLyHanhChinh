<?php
class funcNV extends db{
    public function __construct()
    {
    }
    public function all_nv(): false|array
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT NV.*,PB.tenphong,CV.chucvu FROM nhanvien NV,phongban PB,chucvu CV WHERE NV.maphong = PB.maphong and NV.macv = CV.macv");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $stmt->fetchAll();
    }

    public function one_nv($id)
    {
        $conn = $this->getDB();
        $query = "SELECT * FROM nhanvien where manv =" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function del_nv($id)
    {
        $conn = $this->getDB();
        $sql = "DELETE FROM nhanvien WHERE manv=$id";
        $conn->exec($sql);
        $conn = null;
    }

    public function update_nv($id, $tenNV, $userName, $password, $maPhong, $gioiTinh, $ngaySinh, $maCV, $hinh)
    {
        $conn = $this->getDB();
        $query = "UPDATE nhanvien SET tennv = ?, username = ?,password = ?,maphong = ?,gioitinh = ?,ngaysinh = ?,macv = ?,hinh = ? WHERE nhanvien .manv = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$tenNV, $userName, $password, $maPhong, $gioiTinh, $ngaySinh, $maCV,$hinh,$id ]);
    }

    public function insert_nv($tenNV, $userName, $password, $maPhong, $gioiTinh, $ngaySinh, $maCV,$hinh)
    {
        $conn = $this->getDB();
        $query = "INSERT INTO nhanvien (manv, tennv, username, password, maphong, gioitinh, ngaysinh, macv,hinh) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$tenNV, $userName, $password, $maPhong, $gioiTinh, $ngaySinh, $maCV,$hinh]);
    }
}