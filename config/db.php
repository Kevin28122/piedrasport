<?php
class db
{
    private $host = "localhost";
    private $dbname = "piedrasportsdb";
    private $user = "root";
    private $password = "";

    public function conexion()
    {
        try {
            $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            echo'<h1>Conexion exitosa</h1>';
            return $pdo;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}