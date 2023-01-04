<?php
include "db.php";
class phongban extends db
{
    public function all_dp()
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT * FROM phongban");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $stmt->fetchAll();
    }
    public  function one_dp($id){
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT * FROM phongban WHERE maphong=$id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $stmt->fetch();
    }
    public function del_pb($id)
    {
        $conn = $this->getDB();
        $sql = "DELETE FROM phongban WHERE maphong=$id";
        $conn -> exec($sql);
        $conn = null;
    }
    public function upd_pb($tenP,$vietT,$ghichu,$id){
        $conn = $this->getDB();
        $stmt = $conn->prepare("UPDATE phongban SET tenphong=?, viettat=?, :ghichu=? WHERE maphong=$id");
        $stmt->execute([$tenP,$vietT,$ghichu,$id]);
        $conn = null;
    }
    public function insert_pb($tenP,$vietT,$ghiChu){
        $conn = $this->getDB();
        $stmt = $conn ->prepare("INSERT INTO phongban  (tenphong,viettat,ghichu) VALUES (?,?,?)");
        $conn = null;
        return $kq = $stmt -> execute([$tenP,$vietT,$ghiChu]);

    }
}


























