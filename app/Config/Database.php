<?php

class Database
{
    private $host = "localhost";
    private $dbname = "rrhh";
    private $user = "root";
    private $password = "03V6SW1Gxv5*";

    public function conectar()
    {
        try {

            $conexion = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                $this->user,
                $this->password
            );

            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conexion;

        } catch (PDOException $e) {

            die("Error de conexión: " . $e->getMessage());

        }
    }
}