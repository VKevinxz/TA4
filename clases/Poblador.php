<?php
include_once "ConexionBD.php";
class Poblador{
    private $nombres;
    private $apellidos;
    private $idUsuario;
    private $DNI;

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
            $resultado[4] = $DNI;
        }

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function actualizar(String $nombres, String $apellidos, int $id, int $DNI){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "UPDATE pobladores SET nombres='$nombres', apellidos='$apellidos', DNI='$DNI' WHERE id=$id";
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
