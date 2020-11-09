<?php
    
    if (isset($_GET['id_ocupacion']) && isset($_GET['mesa'])) {
        require_once '../model/ocupacionDAO.php';
                $id=$_GET['id_ocupacion'];
                $ocupacion = new Ocupacion($id);
                $ocupacionDAO = new OcupacionDAO();
                $ocupacionDAO->eliminarocupacion($ocupacion);
    }

    if (isset($_GET['id_mesa'])) {
        require_once '../model/ocupacionDAO.php';
                $ocupacionDAO = new OcupacionDAO();
                $ocupacionDAO->crearcupacion();
    }

?>


