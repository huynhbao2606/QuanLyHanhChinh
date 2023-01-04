<?php
require "db.php";
class user extends db
{
    public function loginUser($username, $password)
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE username='".$username."' AND password='".$password."'");
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($kq)){
            return $kq = null;
        }else{
            return $kq['macv'];
        }
    }
}
