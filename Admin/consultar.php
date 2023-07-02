
<html>
<head>
<title>Consultar Datos:</title>
<meta charset="utf-8">
<style>
  body{
      background-color: #6c6fc6;
  }

      /* Estilos generales del formulario */
  form {
    width: 60%;
    margin: 0 auto;
    padding: 1rem;
    background-color: #e1f0ff; /* Color celeste del recuadro */
    border-radius: 10px;
  }

  /* Estilos de los campos a completar */
  input[type="text"],
  input[type="number"],
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #f0f0f0; /* Color gris de los campos */
    border-radius: 5px;
    border: none;
  }

  /* Estilos del botón submit */
  input[type="submit"] {
    background-color: #ff0000; /* Color rojo y llamativo */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin: 1rem;
  }

  input[type="submit"]:hover {
    background-color: #cc0000; /* Color rojo más oscuro al pasar el cursor */
  }

  h1{
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .separar{
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3rem;
  }

  .titulo{
    font-size: 1.5rem;
    padding: 1rem;
    font-weight: bold;
  }

  .centrar{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
  }

  .margin{
    margin-top: 15%;
  }
</style>

</head>

<body>
<div class="centrar margin">
<h1>Que quieres consultar?</h1>

      <form method="POST" action="consultarBackend.php">
            <label for="tabla">Seleccione una tabla:</label>
            <select id="tabla" name="tabla">
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
                        $sql = "SHOW TABLES";
                        $resultado = $mysqli->query($sql);

                        if ($resultado = $mysqli->query($sql)) {

                        echo "<option value=''>Seleccione una tabla</option>";
                        while ($registro = $resultado->fetch_array()) {
                        echo "<option value='" . $registro[0] . "'>" . $registro[0] . "</option>";
                        }
                        echo "<input type='submit' value='Enviar'>";
                        echo "</select>";
                        echo "</form>";
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
                  <!-- Opciones de las tablas obtenidas dinámicamente -->




</div>


</body>

</html>