<?php
require_once 'ocupacion.php';

class ocupacionDAO{
    private $pdo;

    public function __construct(){
        include '../controller/conexion.php';
        $this->pdo=$pdo;
    }

    //Funcion para estadísticas totales en zona.admin.php.
    public function estadisticatotal(){
        $query= "SELECT COUNT(id_ocupacion) as 'total' FROM tbl_ocupacion";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $total=$sentencia->fetch(PDO::FETCH_ASSOC);
        echo "<p style='font-size:30px; margin:0;color:white;'>".$total['total']."</p>";
        echo "<p style='font-size:20px; margin:0; color:white;'>OCUPACIÓN TOTAL</p>";
    }

    //Funcion para estadísticas activas en zona.admin.php.
    public function estadisticaactiva(){
        $query= "SELECT COUNT(id_mesa) as 'activa' FROM tbl_mesa  WHERE ocupacion_mesa LIKE 'Ocupado';";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $activa=$sentencia->fetch(PDO::FETCH_ASSOC);
        echo "<p style='font-size:30px; margin:0;color:white;'>".$activa['activa']."</p>";
        echo "<p style='font-size:20px; margin:0; color:white;'>MESAS OCUPADAS</p>";
    }

    //Funcion para mostrar las mesas ocupadas.
    public function mesasocupadas(){
        $query= "SELECT tbl_mesa.*, tbl_sala.nombre_sala, tbl_ocupacion.hora_inicio  FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala INNER JOIN tbl_ocupacion ON tbl_mesa.id_mesa=tbl_ocupacion.id_mesa  WHERE ocupacion_mesa LIKE 'Ocupado' AND tbl_ocupacion.estado_ocupacion LIKE '%Abierta%'  
        ORDER BY `tbl_mesa`.`id_mesa` ASC";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $ocupada=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>";
                echo "<th>Mesa</th>";
                echo "<th>Sala</th>";
                echo "<th>Capacidad de la mesa</th>";
                echo "<th>Hora inicio</th>";
                echo "<th>Estado de la mesa</th>";
            echo "</tr>";
            
        foreach($ocupada as $ocupadas) {
            echo "<tr>";
                echo "<td>".$ocupadas['id_mesa']."</td>";
                echo "<td>".$ocupadas['nombre_sala']."</td>";
                echo "<td>".$ocupadas['capacidad_mesa']."<a> personas</a></td>";
                echo "<td>".$ocupadas['hora_inicio']."</td>";
                echo "<td>".$ocupadas['ocupacion_mesa']."</td>";
                echo "</tr>";
        }   
        echo "</table>";
    }

    //Funcion para estadísticas recientes en zona.admin.php.
    public function estadisticareciente(){
        $fecha = date("Y-m-d",time());
        $query= "SELECT COUNT(id_ocupacion) as 'reciente' FROM tbl_ocupacion WHERE fecha_ocupacion='".$fecha."';";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $reciente=$sentencia->fetch(PDO::FETCH_ASSOC);
        echo "<p style='font-size:30px; margin:0;color:white;'>".$reciente['reciente']."</p>";
        echo "<p style='font-size:20px; margin:0; color:white;'>OCUPACIONES DE HOY</p>";
    }

    //Funcion para mostrar las mesas de hoy.
    public function mesasrecientes(){
        $fecha = date("Y-m-d",time());
        $query= "SELECT tbl_mesa.*, tbl_sala.nombre_sala, tbl_ocupacion.hora_inicio  FROM tbl_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala = tbl_sala.id_sala INNER JOIN tbl_ocupacion ON tbl_mesa.id_mesa=tbl_ocupacion.id_mesa WHERE fecha_ocupacion='".$fecha."';";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $reciente=$sentencia->fetchALL(PDO::FETCH_ASSOC);
        echo "<table>";
            echo "<tr>";
                echo "<th>Mesa</th>";
                echo "<th>Sala</th>";
                echo "<th>Capacidad de la mesa</th>";
                echo "<th>Hora inicio</th>";
                echo "<th>Estado de la mesa</th>";
            echo "</tr>";
            
        foreach($reciente as $recientes) {
            echo "<tr>";
                echo "<td>".$recientes['id_mesa']."</td>";
                echo "<td>".$recientes['nombre_sala']."</td>";
                echo "<td>".$recientes['capacidad_mesa']."<a> personas</a></td>";
                echo "<td>".$recientes['hora_inicio']."</td>";
                echo "<td>".$recientes['ocupacion_mesa']."</td>";
                echo "</tr>";
        }   
        echo "</table>";
    }

    //Funcion para mostrar el numero de las incidencias totales en zona.admin.php
    public function estadisiticaincidencias(){
        $query= "SELECT COUNT(id_incidencia) as 'incidencia' FROM tbl_incidencia";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $incidencia=$sentencia->fetch(PDO::FETCH_ASSOC);
        echo "<p style='font-size:30px; margin:0;color:white;'>".$incidencia['incidencia']."</p>";
        echo "<p style='font-size:20px; margin:0; color:white;'>INCIDENCIAS</p>";
    }

    //Funcion para mostrar la tabla con las ocupaciones totales.
    public function mostrartotal(){
        $query= "SELECT tbl_ocupacion.* , tbl_empleado.nombre_empleado, tbl_empleado.apellido1_empleado, tbl_sala.nombre_sala, tbl_mesa.id_mesa, tbl_mesa.capacidad_mesa FROM `tbl_ocupacion` INNER JOIN tbl_empleado ON tbl_ocupacion.DNI_empleado=tbl_empleado.DNI_empleado INNER JOIN tbl_mesa ON tbl_ocupacion.id_mesa=tbl_mesa.id_mesa
        INNER JOIN tbl_sala ON tbl_mesa.id_sala=tbl_sala.id_sala";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $total=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($total);
        echo "<table>";
            echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Empleado</th>";
                echo "<th>Apellido</th>";
                echo "<th>Sala</th>";
                echo "<th>Mesa</th>";
                echo "<th>Nº Personas</th>";
                echo "<th>Fecha</th>";
                echo "<th>Hora Inicial</th>";
                echo "<th>Hora Final</th>";
                echo "<th>Estado</th>";
            echo "</tr>";
            
        foreach($total as $totales) {
            echo "<tr>";
                echo "<td>".$totales['id_ocupacion']."</td>";
                echo "<td>".$totales['nombre_empleado']."</td>";
                echo "<td>".$totales['apellido1_empleado']."</td>";
                echo "<td>".$totales['nombre_sala']."</td>";
                echo "<td>".$totales['id_mesa']."</td>";
                echo "<td>".$totales['capacidad_mesa']."</td>";
                echo "<td>".$totales['fecha_ocupacion']."</td>";
                echo "<td>".$totales['hora_inicio']."</td>";
                echo "<td>".$totales['hora_final']."</td>";
                echo "<td>".$totales['estado_ocupacion']."</td>";
                echo "</tr>";
        }  
        echo "</table>";
    }

    //Funcion para el filtro total.
    public function filtrototal(){
        $empleado=$_POST['empleado'];
        $apellido=$_POST['apellido'];
        $sala=$_POST['sala'];
        $capacidad=$_POST['personas'];
        $fecha=$_POST['fecha'];
        $estados=$_POST['estado'];
        $query= "SELECT tbl_ocupacion.* , tbl_empleado.nombre_empleado, tbl_empleado.apellido1_empleado, tbl_sala.nombre_sala, tbl_mesa.id_mesa, tbl_mesa.capacidad_mesa FROM `tbl_ocupacion` INNER JOIN tbl_empleado ON tbl_ocupacion.DNI_empleado=tbl_empleado.DNI_empleado INNER JOIN tbl_mesa ON tbl_ocupacion.id_mesa=tbl_mesa.id_mesa
        INNER JOIN tbl_sala ON tbl_mesa.id_sala=tbl_sala.id_sala WHERE tbl_empleado.nombre_empleado LIKE '%$empleado%' AND tbl_empleado.apellido1_empleado LIKE '%$apellido%' AND tbl_sala.nombre_sala LIKE '%$sala%' AND tbl_mesa.capacidad_mesa LIKE '%$capacidad%' AND tbl_ocupacion.fecha_ocupacion LIKE '%$fecha%' AND tbl_ocupacion.estado_ocupacion LIKE '%$estados%';";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $total=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        //print_r($total);
        echo "<table>";
            echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Empleado</th>";
                echo "<th>Apellido</th>";
                echo "<th>Sala</th>";
                echo "<th>Mesa</th>";
                echo "<th>Nº Personas</th>";
                echo "<th>Fecha</th>";
                echo "<th>Hora Inicial</th>";
                echo "<th>Hora Final</th>";
                echo "<th>Estado</th>";
            echo "</tr>";
            
        foreach($total as $totales) {
            echo "<tr>";
                echo "<td>".$totales['id_ocupacion']."</td>";
                echo "<td>".$totales['nombre_empleado']."</td>";
                echo "<td>".$totales['apellido1_empleado']."</td>";
                echo "<td>".$totales['nombre_sala']."</td>";
                echo "<td>".$totales['id_mesa']."</td>";
                echo "<td>".$totales['capacidad_mesa']."</td>";
                echo "<td>".$totales['fecha_ocupacion']."</td>";
                echo "<td>".$totales['hora_inicio']."</td>";
                echo "<td>".$totales['hora_final']."</td>";
                echo "<td>".$totales['estado_ocupacion']."</td>";
                echo "</tr>";
        }  
        echo "</table>";
    }
    
    //funcion para el select del filtro nombre.
    public function formularionombre(){
        $query= "SELECT nombre_empleado FROM tbl_empleado" ;
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $nombre_empleado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nombre_empleado as $nombre) {
            echo '<option value="'.$nombre['nombre_empleado'].'">'.$nombre['nombre_empleado'].'</option>';
        }
    }

    public function formularioapellido(){
        $query= "SELECT apellido1_empleado FROM tbl_empleado" ;
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $nombre_empleado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nombre_empleado as $nombre) {
            echo '<option value="'.$nombre['apellido1_empleado'].'">'.$nombre['apellido1_empleado'].'</option>';
        }
    }

    //funcion para el select del filtro sala.
    public function formulariosala(){
        $query= "SELECT nombre_sala FROM tbl_sala";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $nombre_sala=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nombre_sala as $sala) {
            echo '<option value="'.$sala['nombre_sala'].'">'.$sala['nombre_sala'].'</option>';
        }
    }

    //funcion para el select del filtro sala de incidencias.
    public function formulariosala1(){
        $query= "SELECT id_sala, nombre_sala FROM tbl_sala";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $nombre_sala=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($nombre_sala as $sala) {
            echo '<option value="'.$sala['id_sala'].'">'.$sala['nombre_sala'].'</option>';
        }
    }
    
    //funcion para el select del filtro mesa.
    public function formulariomesa(){
        $query= "SELECT * FROM tbl_mesa ORDER BY id_mesa ASC;";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $id_mesa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($id_mesa as $mesa) {
            echo '<option value="'.$mesa['id_mesa'].'">'.$mesa['id_mesa'].'</option>';
        }
    }

    //funcion para el select del filtro persona.
    public function formulariopersona(){
        $query= "SELECT DISTINCT capacidad_mesa FROM tbl_mesa ORDER BY capacidad_mesa ASC";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $capacidad_mesa=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($capacidad_mesa as $mesa) {
            echo '<option value="'.$mesa['capacidad_mesa'].'">'.$mesa['capacidad_mesa'].'</option>';
        }
    }

    //funcion para el select del filtro fechas.
    public function formulariofecha(){
        $query= "SELECT DISTINCT fecha_ocupacion FROM tbl_ocupacion ORDER BY fecha_ocupacion DESC";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $fecha_ocupacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($fecha_ocupacion as $fecha) {
            echo '<option value="'.$fecha['fecha_ocupacion'].'">'.$fecha['fecha_ocupacion'].'</option>';
        }
    }

    //funcion para el select del filtro estado.
    public function formularioestado(){
        $query= "SELECT DISTINCT estado_ocupacion FROM tbl_ocupacion";
        $sentencia=$this->pdo->prepare($query);
        $sentencia->execute();
        $estado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
        foreach ($estado as $estados) {
            echo '<option value="'.$estados['estado_ocupacion'].'">'.$estados['estado_ocupacion'].'</option>';
        }
    }

    //funcion para eliminar la ocupacion.
    public function eliminarocupacion($ocupacion){
        
        try {
            $this->pdo->beginTransaction();
            $hora=date('H:i:s',time());
            $query= "UPDATE `tbl_ocupacion` SET `hora_final` = ? WHERE `tbl_ocupacion`.`id_ocupacion` = ?;";
            $sentencia=$this->pdo->prepare($query);
            $id=$ocupacion->getId_ocupacion();
            $sentencia->bindParam(1,$hora);
            $sentencia->bindParam(2,$id);
            $sentencia->execute();

            $query= "UPDATE `tbl_ocupacion` SET `estado_ocupacion` = 'Cerrada' WHERE `tbl_ocupacion`.`id_ocupacion` = ?;";
            $sentencia=$this->pdo->prepare($query);
            $id=$ocupacion->getId_ocupacion();
            $sentencia->bindParam(1,$id);
            $sentencia->execute();

            $query= "UPDATE `tbl_mesa` SET `ocupacion_mesa` = 'Libre' WHERE `tbl_mesa`.`id_mesa` = ?;";
            $sentencia=$this->pdo->prepare($query);
            $ids=$_GET['mesa'];
            $sentencia->bindParam(1,$ids);
            $sentencia->execute();

            $query= "SELECT tbl_ocupacion.* , tbl_sala.id_sala FROM `tbl_ocupacion` INNER JOIN tbl_mesa ON tbl_ocupacion.id_mesa=tbl_mesa.id_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala=tbl_sala.id_sala WHERE tbl_mesa.id_mesa=$ids;";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->execute();
            $total=$sentencia->fetch(PDO::FETCH_ASSOC);
            $id=$total['id_sala'];
            echo $id;
            $this->pdo->commit();
            header('Location: ../view/salas.php?id_sala='.$id);
        } catch (Exception $ex) {
            $this->pdo->rollback();
            echo $ex->getMessage();
            }
        
    }

    //funcion para crear ocupacion.
    public function crearcupacion(){
        try {
            $this->pdo->beginTransaction();
            require_once '../controller/sessionController.php';
            $query = "SELECT * FROM `tbl_mesa` WHERE `id_mesa` = ? AND ocupacion_mesa='Ocupado';";
            $sentencia=$this->pdo->prepare($query);
            $sentencia->bindParam(1,$_GET['id_mesa']);
            $sentencia->execute();
            $numRow=$sentencia->rowCount();
            if ($numRow==0) {
                $fecha = date('Y-m-d',time());
                $hora=date('H:i:s',time());
                $estado='Abierta';
                echo $estado;
                $query= "INSERT INTO `tbl_ocupacion` (`fecha_ocupacion`, `hora_inicio`, `estado_ocupacion`, `DNI_empleado`, `id_mesa`) VALUES (?, ?, ?, ?, ?);";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$fecha);
                $sentencia->bindParam(2,$hora);
                $sentencia->bindParam(3,$estado);
                $sentencia->bindParam(4,$_SESSION['DNI_empleado']);
                $sentencia->bindParam(5,$_GET['id_mesa']);
                $sentencia->execute();

                $query= "UPDATE `tbl_mesa` SET `ocupacion_mesa` = 'Ocupado' WHERE `tbl_mesa`.`id_mesa` = ?;";
                $sentencia=$this->pdo->prepare($query);
                $ids=$_GET['id_mesa'];
                $sentencia->bindParam(1,$ids);
                $sentencia->execute();

                $query= "SELECT tbl_ocupacion.* , tbl_sala.id_sala FROM `tbl_ocupacion` INNER JOIN tbl_mesa ON tbl_ocupacion.id_mesa=tbl_mesa.id_mesa INNER JOIN tbl_sala ON tbl_mesa.id_sala=tbl_sala.id_sala WHERE tbl_mesa.id_mesa=$ids;";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->execute();
                $total=$sentencia->fetch(PDO::FETCH_ASSOC);
                $id=$total['id_sala'];
                echo $id;
                $this->pdo->commit();
                header('Location: ../view/salas.php?id_sala='.$id);
            }
            $query= "SELECT tbl_mesa.*, tbl_sala.id_sala FROM `tbl_mesa` INNER JOIN tbl_sala ON tbl_mesa.id_sala=tbl_sala.id_sala WHERE tbl_mesa.id_mesa=?;";
                $sentencia=$this->pdo->prepare($query);
                $sentencia->bindParam(1,$_GET['id_mesa']);
                $sentencia->execute();
                $total=$sentencia->fetch(PDO::FETCH_ASSOC);
                $id=$total['id_sala'];
                echo $id;
                $this->pdo->commit();
                header('Location: ../view/salas.php?id_sala='.$id);
        }
        catch (Exception $ex) {
            $this->pdo->rollback();
            echo $ex->getMessage();
        }   
    }
}
?>