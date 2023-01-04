<?php
class db
{
    public $mDB = null;

    public function __construct(){}

    public function getDB()
    {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbName = 'qlhc';

        if (!isset($this->mDB)) {
            try {
                $this->mDB = new PDO("mysql:host=$host;dbname=$dbName", $username, $password,
                    array(PDO::ATTR_PERSISTENT => true));
                $this->mDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                return false;
            }
        }
        return $this->mDB;
        }
}

