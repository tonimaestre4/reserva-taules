<!DOCTYPE html>
<html lang="es">
   <meta charset=UTF-8>
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="../css/estilos.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <style>
         table {
         border-collapse: collapse;
         width: 100%;
         border: #f2f7f8 solid 15px;
         }
         th, td {
         text-align: left;
         padding: 8px;
         }
         tr:nth-child(even){background-color: #f2f2f2}
         th {
         background-color: gray;
         color: white;
         }
      </style>
   </head>
   <body>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <!-- Aqui llamamos a la funcion nombresala para mostrar los nombres de la sala y la funcion ocupacionsala para mostrar el contenido de las salas -->
      <div style="padding-left: 11%;">
         <?php
            require_once '../model/salaDAO.php';
            $id=$_GET['id_sala'];
            $sala = new Sala($id);
            $salaDAO = new SalaDAO();
            $salaDAO->nombresala($sala);
            ?>
      </div>
      <div class="row">
         <div class="one-column">
            <?php
               $id=$_GET['id_sala'];
               $sala = new Sala($id);
               $salaDAO = new SalaDAO();
               $salaDAO->ocupacionsala($sala);
               ?>
         </div>
      </div>
      </br>
      <footer>
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>