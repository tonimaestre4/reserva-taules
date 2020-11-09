<?php
require_once 'empleado.php';

class EmpleadoDAO{
    private $pdo;

    public function __construct(){
        include '../controller/conexion.php';
        $this->pdo=$pdo;
    }

    //Funcion para comprobar que existe el usuario.
    public function login($empleado){
        $query = "SELECT * FROM tbl_empleado WHERE DNI_empleado=? AND password_empleado=?";
        $sentencia=$this->pdo->prepare($query);
        $dni=$empleado->getDNI_empleado();
        $psswd=$empleado->getPassword_empleado();
        $sentencia->bindParam(1,$dni);
        $sentencia->bindParam(2,$psswd);
        $sentencia->execute();
        $result=$sentencia->fetch(PDO::FETCH_ASSOC);
        $nombre = $result['nombre_empleado'];
        $tipo = $result['tipo_empleado'];
        $numRow=$sentencia->rowCount();
        if($numRow==1){
            //($result['nombre_empleado']);
            session_start();
            $_SESSION['DNI_empleado']=$dni;
            $_SESSION['nombre_empleado']=$nombre;
            return $tipo;
        }else {
            return 'no encontrar';
        }
    }
}
?>