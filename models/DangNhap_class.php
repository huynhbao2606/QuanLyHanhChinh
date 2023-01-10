<?php
class user extends db
{
    public function loginUser($user, $pass)
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE username=? AND password=?");
        $stmt->execute([$user,$pass]);
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        return (empty($kq)) ? null : $kq['macv'];
    }
}
