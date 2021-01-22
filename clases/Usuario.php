<?php
include_once "ConexionBD.php";
class Usuario{
    private $codigo;
    private $password;

    public function __construct(int $codigo=0, string $password="algo")
    {
        $this->codigo = $codigo;
        $this->password = $password;
    }

    public function guardar(){
        // creamos el objeto de conexion
        $conexionBD = new ConexionBD();

        // 1. establecer la conexion a la BD
        $conn = $conexionBD->Conectar();
        // 2. realizar la consulta y almacenar el resultado en una variable
            // 2.1. Preparar la sentencia
        $sql = "INSERT INTO usuarios(codigo, password) VALUES(?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $this->codigo, $this->password);
            // 2.2. Ejecutar la sentencia
        $stmt->execute();
        $result = $stmt->affected_rows;
        // 3. cerrar la conexion
        $conexionBD->Cerrar();

        // devolvemos la variable resultado
        return $result;
    }

    public function eliminar(int $id){
        $conexionBD = new ConexionBD();
        $conn = $conexionBD->Conectar();

        $sql = "DELETE FROM usuarios WHERE id=$id";
        $resultado = $conn->query($sql);

        $conexionBD->Cerrar();

        return $resultado;
    }

    public function traerDatos(){
        $conexionBD = new ConexionBD();

        $conn = $conexionBD->Conectar();
        $temp = $conn->query("SELECT * FROM usuarios");
        $conexionBD->Cerrar();

        return $temp->fetch_all();
    }

    public function buscarUsuario(array $datos, int $usuario): int{
        $resultado = 0;
        foreach($datos as $item) {
            if($usuario == (int)$item[1]){
                $resultado = $item[0];
                break;
            }
        }
        return $resultado;
    }

    public function validarContraseña(int $id, string $passForm): bool{
        $conexionBD = new ConexionBD();

        $conn = $conexionBD->Conectar();
        $temp = $conn->query("SELECT password FROM usuarios WHERE id=$id");
        $conexionBD->Cerrar();

        $item = $temp->fetch_assoc();
        $passBD = $item["password"];

        if($passForm == $passBD){
            return true;
        }
        return false;
    }
}

