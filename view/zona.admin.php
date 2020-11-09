<!DOCTYPE html>
<html lang="es">
   <meta charset=UTF-8>
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="../css/estilos.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   </head>
   <body>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <!-- Aqui mostramos la pagina principal dodne vemos todas las salas y las estadisticas-->
      <div style="padding-left: 11%;">
         <h3 style="color:#0ea4fb;">Panel de control</h3>
         <h5 style="color:#717981;">Inicio</h5>
      </div>
      <div class="row">
         <div class="one-column">
            <a href="total.php">
               <div class="four-column" style="height: 100px; background-color:#55ce63;text-align:center;">
                  <?php
                     require_once '../model/ocupacionDAO.php';
                         $ocupacionDAO = new OcupacionDAO();
                         $ocupacionDAO->estadisticatotal();
                     ?>
               </div>
            </a>
            <a href="activa.php">
               <div class="four-column" style="height: 100px; background-color:#7460ee;text-align:center;">
                  <?php
                     $ocupacionDAO = new OcupacionDAO();
                     $ocupacionDAO->estadisticaactiva();
                     ?>
               </div>
            </a>
            <a href="reciente.php">
               <div class="four-column" style="height: 100px; background-color:#009ffb;text-align:center;">
                  <?php
                     $ocupacionDAO = new OcupacionDAO();
                     $ocupacionDAO->estadisticareciente();
                     ?>
               </div>
            </a>
            <a href="incidencias.php">
               <div class="four-column" style="height: 100px; background-color:#ffbc34;text-align:center;"> 
                  <?php
                     $ocupacionDAO = new OcupacionDAO();
                     $ocupacionDAO->estadisiticaincidencias();
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=1">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=1;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=2">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=2;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=3">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=3;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=4">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=4;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=5">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=5;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=6">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=6;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=7">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=7;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
            <a href="salas.php?id_sala=8">
               <div class="four-column" style="height: 150px; background-color:white;">
                  <?php
                     require_once '../model/salaDAO.php';
                     $id_sala=8;
                     $sala = new Sala($id_sala);
                     $salaDAO = new SalaDAO();
                     $salaDAO->elegirsala($sala);
                     ?>
               </div>
            </a>
         </div>
      </div>
      <footer style="position:absolute;">
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>