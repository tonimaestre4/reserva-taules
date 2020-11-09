<!DOCTYPE html>
<html lang="es">
   <body>
      <head>
         <title>Incidencias</title>
         <link rel="stylesheet" type="text/css" href="../css/estilos.css">
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <style>
            input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }
            input[type=submit] {
            width: 100%;
            background-color: #ffbc34;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }
            input[type=submit]:hover {
            background-color: #ffbc34;
            }
         </style>
      </head>
      <?php
         require_once '../controller/sessionController.php';
         ?>
      <div style="padding-left: 11%;">
         <h3 style="color:#0ea4fb;">Crear Incidencia</h3>
         <h5 style="color:#717981;"><a style="text-decoration:none;color:#69bcfb;" href="zona.admin.php">Inicio</a> > <a style="text-decoration:none;color:#69bcfb;" href="incidencias.php">Incidencia</a> > Crear Incidencias</h5>
      </div>
      <div class="row">
         <div class="one-column">
            <div style="margin-left:2%;">
               <form action="crear_incidencia.php" method="POST">
                  <label>Sala:</label>
                  <select type="text" id="sala" name="sala">
                     <option value="">Seleccione:</option>
                     <?php
                        require_once  '../model/ocupacionDAO.php'; 
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formulariosala1();
                        ?>    
                  </select>
                  <label>Mesa:</label>
                  <select type="text" id="mesa" name="mesa">
                     <option value="">Seleccione:</option>
                     <?php
                        require_once  '../model/ocupacionDAO.php'; 
                        $ocupacionDAO = new OcupacionDAO();
                        $ocupacionDAO->formulariomesa();
                        ?>          
                  </select>
                  <label>Observación</label>
                  <input type="text" id="observacion" name="observacion" placeholder="Observació...">
                  <input type="submit" value="Enviar">
               </form>
            </div>
            <!-- Aqui llamamos a la funcion crearincidencia que nos creara incidencias -->
            <?php
               require_once  '../model/incidenciaDAO.php';
               if (isset($_POST['sala']) || isset($_POST['mesa']) || isset($_POST['observacion'])){
               $incidenciaDAO = new IncidenciaDAO();
               $incidenciaDAO->crearincidencia();
               } 
               ?> 
         </div>
      </div>
      </br>
      <footer style="position:absolute;">
         <h5 style="font-size:15px;">© 2015-2020 Cotizador web desarrollado por: <a style="color:blue;">chasecake@factory.com</a></h5>
      </footer>
   </body>
</html>