<?php
    //LLama a la funcion para eliminar.
    if (isset($_GET['id_incidencia'])) {
        require_once '../model/incidenciaDAO.php';
                $incidenciaDAO = new IncidenciaDAO();
                $incidenciaDAO->eliminarincidencia();
    }

?>


