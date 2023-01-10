<?php
class user extends db
{
    public function loginUser($user, $pass)
    {
        $conn = $this->getDB();
        $query = "SELECT * FROM nhanvien WHERE username=:username AND password=:password";
        $stmt = $conn ->prepare($query);
        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":password", $pass);
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null;
        return (empty($kq)) ? null : $kq['macv'];
    }
}
