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
         background-color: #4CAF50;
         color: white;
         }
      </style>
   </head>
   <body>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <!-- Aqui llamamos a la funcion filtrototal que nos filtrar por nombre,sala,fecha y el estado de la mesa y la funcion mostrartotal para mostrar todas las ocupaciones desde que abrio el restaurante-->
      <div style="padding-left: 11%;">
         <h3 style="color:#0ea4fb;">Ocupación Total</h3>
         <h5 style="color:#717981;"><a style="text-decoration:none;color:#69bcfb;" href="zona.admin.php">Inicio</a> > Ocupación Total</h5>
      </div>
      <div class="row">
         <div class="one-column">
            </br>
            <div class="container">
               <form action="total.php" method="POST">
                  <label>Empleado:</label>
                  <select type="text" id="empleado" name="empleado">
                     <option value="">Seleccione:</option>
                     <?php
                        require_once  '../model/ocupacionDAO.php'; 
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formularionombre();
                        ?>          
                  </select>
                  <label>Apellido:</label>
                  <select type="text" id="apellido" name="apellido">
                     <option value="">Seleccione:</option>
                     <?php
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formularioapellido();
                        ?>    
                  </select>
                  <label>Sala:</label>
                  <select type="text" id="sala" name="sala">
                     <option value="">Seleccione:</option>
                     <?php
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formulariosala();
                        ?>    
                  </select>
                  <label>Nº Personas:</label>
                  <select type="text" id="personas" name="personas">
                     <option value="">Seleccione:</option>
                     <?php
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formulariopersona();
                        ?>      
                  </select>
                  <label>Fecha:</label>
                  <select type="text" id="fecha" name="fecha">
                     <option value="">Seleccione:</option>
                     <?php
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formulariofecha();
                        ?>      
                  </select>
                  <label>Estado:</label>
                  <select type="text" id="estado" name="estado">
                     <option value="">Seleccione:</option>
                     <?php
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formularioestado();
                        ?>      
                  </select>
                  <input class="submit" type="submit" value="Filtrar">
               </form>
            </div>
            </br>
            <?php
               require_once '../model/ocupacionDAO.php';
               if (isset($_POST['empleado']) || isset($_POST['apellido']) ||isset($_POST['sala']) || isset($_POST['personas']) || isset($_POST['fecha']) || isset($_POST['estado_ocupacion'])){
                 $ocupacionDAO = new OcupacionDAO();
                 $ocupacionDAO->filtrototal();
               } else {
                 $ocupacionDAO = new OcupacionDAO();
                 $ocupacionDAO->mostrartotal();
               }
               ?>
         </div>
      </div>
      </br>
      <footer>
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>