<!DOCTYPE html>
<html lang="es">
   <body>
      <head>
         <title>Incidencias</title>
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
            background-color: #ffbc34;
            color: white;
            }
         </style>
      </head>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <div style="padding-left: 11%;">
         <h3 style="color:#0ea4fb;">Incidencias</h3>
         <h5 style="color:#717981;"><a style="text-decoration:none;color:#69bcfb;" href="zona.admin.php">Inicio</a> > Incidencias</h5>
      </div>
      <div class="row">
         <div class="one-column">
            <div style='margin-left:0.5%;'><button class="submit2" onclick="location.href='crear_incidencia.php'">Crear Incidencia</button></div>
            <!-- Aqui llamamos a la funcion incidencia para mostrar todas las incidencias -->
            <?php
               require_once '../model/incidenciaDAO.php';
               $incidenciaDAO = new incidenciaDAO();
               $incidenciaDAO->incidencia();
               ?>
         </div>
      </div>
      </br>
      <footer style="position:absolute;">
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>