<?php
include_once "ConexionBD.php";
class Residencia{
    private $provincia;
    private $departamento;
    private $distrito;
    private $dirección;

      public function __construct(String $provincia, String $departamento, String $distrito, String $dirección)
      {
        $this->provincia ==$provincia;
        $this->dirección ==$dirección;
        $this->distrito ==$distrito;
        $this->departamento ==$departamento;
      }

    public function traerTodo(){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "SELECT * FROM pobladores";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $resultado = $sentencia->get_result();
        $conexionBD->Cerrar();

        return $resultado;
    }

    public function traerPorId(int $id){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "SELECT * FROM pobladores WHERE id=$id";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $sentencia->bind_result($ide, $nombres, $apellidos, $idu);
        while($sentencia->fetch()){
            $resultado[0] = $ide;
            $resultado[1] = $nombres;
            $resultado[2] = $apellidos;
            $resultado[3] = $idu;
        }

        $conexionBD->Cerrar();

        return $resultado;
    }

      public function actualizar(String $provincia, String $distrito, String $departamento, String $dirección){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "UPDATE pobladores SET nombres='$nombres', apellidos='$apellidos' WHERE id=$id";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function eliminar(int $idUsuario){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "DELETE FROM pobladores WHERE id_usuario=$idUsuario";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }
}
