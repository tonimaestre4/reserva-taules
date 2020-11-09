<?php
session_start();
session_destroy();
header ('Location:../view/login.php');
//elimina y destruye la sesion.
?>