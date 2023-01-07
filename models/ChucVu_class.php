<?php

class FuncCV extends db
{


    public function Insert_CV($chucVu)
    {
        $conn = $this->getDB();
        $query = "INSERT INTO chucvu (macv, chucvu) VALUES (NULL,:chucVu)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":chucVu", $chucVu);
        $stmt->execute();
    }

    public function Update_CV($id, $chucVu)
    {
        $conn = $this->getDB();
        $query = "UPDATE chucvu SET chucvu=:chucVu WHERE macv=:id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":chucVu", $chucVu);
        $stmt->execute();
    }

    public function One_CV($id)
    {
        $conn = $this->getDB();
        $query = "SELECT * FROM chucvu where macv =" . $id;
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function del_CV($id)
    {
        $conn = $this->getDB();
        $query = "DELETE FROM chucvu WHERE macv=$id";
        $conn->exec($query);
    }

    public function All_CV()
    {
        $conn = $this->getDB();
        $query = "SELECT * FROM chucvu";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

}