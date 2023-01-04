<?php
require "db.php";
class register extends db {
    public function insertUser($username,$password,$email)
    {
        $conn = $this->getDB();
        $query = "INSERT INTO nhanvien (id,user,pass,email) VALUES (NULL,:username,:password,:email)";
        $stmt = $conn -> prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return 1;
    }

}