<?php
require_once 'incidencia.php';

class incidenciaDAO{
    private $pdo;

    public function __construct(){
        include '../controller/conexion.php';
        $this->pdo=$pdo;
    }

    //funcion para mostrar las incidencias.
    public function incidencia(){
        $query= "SELECT tbl_incidencia.id_incidencia, tbl_incidencia.observacion, tbl_incidencia.id_mesa,tbl_sala.nombre_sala, tbl_empleado.* FROM tbl_incidencia INNER JOIN tbl_sala ON tbl_incidencia.id_sala = tbl_sala.id_sala INNER JOIN tbl_empleado ON tbl_empleado.DNI_empleado = tbl_incidencia.DNI_empleado";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $incidencia=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>";
                echo "<th>Incidencia</th>";
                echo "<th>Empleado</th>";
                echo "<th>Observación</th>";
                echo "<th>Sala</th>";
                echo "<th>Mesa</th>";
                echo "<th>Cerrar</th>";
            echo "</tr>";
        foreach($incidencia as $incidencias){
            echo "<tr>";
                echo "<td>".$incidencias['id_incidencia']."</td>";
                echo "<td>".$incidencias['nombre_empleado']."</td>";
                echo "<td>".$incidencias['observacion']."</td>";
                echo "<td>".$incidencias['nombre_sala']."</td>";
                echo "<td>".$incidencias['id_mesa']."</td>";
                echo "<td><a href='../controller/eliminarincidencias.php?id_incidencia=".$incidencias['id_incidencia']."'><img src='../img/borrar.png' alt='Borrar' style='width:30px;heigth:30px;'></img></a></td>";
            echo "</tr>";
    }
    echo "</table>";
    }

    //Funcion para crear la incidencia.
    public function crearincidencia(){
        try {
            require_once '../controller/sessionController.php';
            $sala=$_POST['sala'];
            $mesa=$_POST['mesa'];
            $observacion=$_POST['observacion'];
            $empleado=$_SESSION['DNI_empleado'];
            if ($mesa=="") {
                $query= "INSERT INTO tbl_incidencia (observacion, DNI_empleado, id_sala) VALUES (?,?,?);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$observacion);
                $sentencia->bindParam(2,$empleado);
                $sentencia->bindParam(3,$sala);
                $sentencia->execute();
                header('Location: ../view/incidencias.php');
            } else {
                $query= "INSERT INTO tbl_incidencia (observacion, DNI_empleado, id_mesa, id_sala) VALUES (?,?,?,?);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$observacion);
                $sentencia->bindParam(2,$empleado);
                $sentencia->bindParam(3,$mesa);
                $sentencia->bindParam(4,$sala);
                $sentencia->execute();
                header('Location: ../view/incidencias.php');
            }
        }
        catch (Exception $ex) {
            $this->pdo->rollback();
            echo $ex->getMessage();
        }   
    }

    //Función para eliminar la incidencia.
    public function eliminarincidencia(){
        try {
            require_once '../controller/sessionController.php';
            $id=$_GET['id_incidencia'];
            $query= "DELETE FROM `tbl_incidencia` WHERE `tbl_incidencia`.`id_incidencia` = ?";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$id);
            $sentencia->execute();
            header('Location: ../view/incidencias.php');
        }
        catch (Exception $ex) {
            $this->pdo->rollback();
            echo $ex->getMessage();
        }   
    }
}
?>