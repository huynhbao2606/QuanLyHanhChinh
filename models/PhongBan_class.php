<?php

include "DataBase_class.php";

class funcPB extends db
{
    public function __construct()
    {
    }
    public function all_pb(): false|array
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("SELECT * FROM phongban");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $stmt->fetchAll();
    }

    public function one_pb($id)
    {
        $conn = $this->getDB();
        $query = "SELECT * FROM phongban where maphong =" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function del_pb($id)
    {
        $conn = $this->getDB();
        $sql = "DELETE FROM phongban WHERE maphong=$id";
        $conn->exec($sql);
        $conn = null;
    }

    public function upd_pb($tenP, $vietT, $ghiChu, $id)
    {
        $conn = $this->getDB();
        $sql = "UPDATE phongban SET tenphong=?,viettat=?,ghichu=? WHERE maphong=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$tenP, $vietT, $ghiChu, $id]);
        $conn = null;
    }

    public function insert_pb($tenP, $vietT, $ghiChu): bool
    {
        $conn = $this->getDB();
        $stmt = $conn->prepare("INSERT INTO phongban (tenphong,viettat,ghichu) VALUES (?,?,?)");
        $conn = null;
        return $kq = $stmt->execute([$tenP, $vietT, $ghiChu]);

    }

    public function getNextID() {
        $conn = $this->getDB();
        $stmt = $conn->prepare('SELECT auto_increment + 1 AS NEXT_ID FROM `information_schema`.`tables` WHERE  table_name = "phongban" AND table_schema = "qlhc"');
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $conn = null;
        return $stmt->fetch();
    }
}