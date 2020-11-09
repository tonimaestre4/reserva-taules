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
         background-color: #7460ee;
         color: white;
         }
      </style>
   </head>
   <body>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <div style="padding-left: 11%;">
         <h3 style="color:#0ea4fb;">Mesas ocupadas</h3>
         <h5 style="color:#717981;"><a style="text-decoration:none;color:#69bcfb;" href="zona.admin.php">Inicio</a> > Mesas ocupadas</h5>
      </div>
      <div class="row">
         <div class="one-column">
            <!-- Aqui llamamos a la funcion mesasocupadas que nos muestra las mesas ocupadas actualmente -->
            <?php
               require_once '../model/ocupacionDAO.php';
                   $ocupacionDAO = new OcupacionDAO();
                   $ocupacionDAO->mesasocupadas();
               ?>
         </div>
      </div>
      </br>
      <footer>
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>