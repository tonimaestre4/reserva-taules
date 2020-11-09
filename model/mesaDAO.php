<?php
require_once 'mesa.php';

class mesaDAO{
    private $pdo;

    public function __construct(){
        include '../controller/conexion.php';
        $this->pdo=$pdo;
    }
}
?>