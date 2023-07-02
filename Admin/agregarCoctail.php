<html>
<head>
<title>Ejemplo de insertar Coctails</title>
<meta charset="utf-8">
<style>
  body{
      background-color: #6c6fc6;
  }

      /* Estilos generales del formulario */
  form {
    width: 500px;
    margin: 0 auto;
    padding: 1rem;
    background-color: #e1f0ff; /* Color celeste del recuadro */
    border-radius: 10px;
    margin-top: 7rem;  
  }

  /* Estilos de los campos a completar */
  input[type="text"],
  input[type="number"],
  input[type="date"],select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #f0f0f0; /* Color gris de los campos */
    border-radius: 5px;
    border: none;
  }

  /* Estilos del botón submit */
  input[type="submit"],button,a {
    background-color: #ff0000; /* Color rojo y llamativo */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color :#cc0000; /* Color rojo más oscuro al pasar el cursor */
  }

  button,a{text-decoration: none;}
    .separar{
      display: flex;
      justify-content: space-between;
    }

    select{margin-bottom: 2rem;}

</style>
</head>
<body>
<form action="backendAgregarCoctail.php" method="POST">
Nombre: <input type="text" placeholder="Coctail" name="nombre"><br>
Precio: <input type="number" name="precio"><br>
<!--  <input type="number" placeholder="Id-preparacion" name="id-prepa"> -->
ID-prepa: <select id="prepa" name="id_prepa">
                  <?php
                  
                        //inicialitzem la sessio

                        session_start();

                        $mysqli = new mysqli('localhost', 'root', '', 'gestion_alcohol');


                        if ($mysqli->connect_errno) {

                              // Comprovem si ens dona un error. Si hi ha error donem els següents missatges:

                        echo "Error de conexión.";

                              echo "Error: Fallo al conectarse a MySQ: \n";

                        echo "Error: " . $mysqli->connect_errno . "\n";

                        echo "Error: " . $mysqli->connect_error . "\n";

                              exit;

                        }    
                        //Especifiquem que les consultes ens retornin una codificació utf-8

                        $mysqli->set_charset("utf8");

                        // Realizar una consulta para obtener todos los elementos de la tabla seleccionada
                        $sql = 'SELECT * FROM preparacioncoctails';
                        $resultado = $mysqli->query($sql);

                        if ($resultado = $mysqli->query($sql)) {

                        echo "<option value=''>Seleccione una preparacion</option>";
                        while ($registro = $resultado->fetch_array()) {
                        echo "<option value='" . $registro['id_preparacioncoctails'] . "'>" . $registro['id_preparacioncoctails'] .'-'. $registro['nombre']. "</option>";
                        }
                        echo "</select>";                
                  } 
                        else {

                              //Si la consulta és incorrecte, donarem els següents missatges

                        echo "Fallo en la consulta";

                        echo "Error: La ejecución de la consulta falló debido a: \n";

                        echo "Query: " . $sql . "\n";

                        echo "Error: " . $mysqli->errno . "\n";

                        echo "Error: " . $mysqli->error . "\n";

                        exit;

                        }    

                        // L’script, automàticament, tancarà la connexió

                        // a MySQL quan finalitzi, encara que ho podem fer nosaltres mateixos

                        // executant:

                        $mysqli->close();                 

                        ?>


<div class="separar">
<input type="submit" value="Guardar datos">
<button><a href="/curs-pimec/Admin/inicio.php">Volver</a></button>
</div>
</form>
</body>
</html>