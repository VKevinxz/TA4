<?php
class ConexionBD{
    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $db = "universidad";
    private $conn;

    public function Conectar(){
        $this->conn = new mysqli($this->host, $this->usuario,$this->password,$this->db);
        return $this->conn;
    }

    public function Cerrar(){
        $this->conn->close();
    }
}
