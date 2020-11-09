<?php
require_once '../model/empleado.php';
require_once '../model/empleadoDAO.php';
if (isset($_POST['dni'])) {
$empleado = new Empleado($_POST['dni'], md5($_POST['psswd']));
$empleadoDAO = new EmpleadoDAO();
$tipo=$empleadoDAO->login($empleado);
echo $tipo;
if($tipo=='Camarero'){
    header('Location: ../view/camareros.php');
}
if($tipo=='Mantenimiento'){
    header('Location: ../view/mantenimiento.php');
}
if($tipo=='Administrador'){
    header('Location: ../view/zona.admin.php');
}
die;
if($empleadoDAO->login($empleado)!='no encontrar'){
    
    if($empleadoDAO->login($empleado)=='Camarero'){
        header('Location: ../view/camareros.php');    
    }
    if($empleado->getTipo_empleado()=='Mantenimiento'){
        header('Location: ../view/mantenimiento.php');    
    }
    header('Location: ../view/zona.admin.php');
}else {
    header('Location: ../view/login.php?mensaje=1');
}
}else {
    header('Location:../view/login.php');
}