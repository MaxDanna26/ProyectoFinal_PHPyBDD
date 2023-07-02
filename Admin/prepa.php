
<html>
<head>
<title>Ejemplo de insertar preparaciones</title>
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
  input[type="submit"],button,a {
    background-color: #ff0000; /* Color rojo y llamativo */
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #cc0000; /* Color rojo más oscuro al pasar el cursor */
  }

  h1{
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .titulo{
    font-size: 1.5rem;
    padding: 1rem;
    font-weight: bold;
  }

  button,a{text-decoration: none;}
  .separar{
    display: flex;
    justify-content: space-between;
  }
</style>

</head>

<body>

<h1>Preparacion de coctail:</h1>

  <form action="backendPrepa.php" method="POST">
  Nombre coctail: <input type="text" name="nombrePrepa"><br>
<div class="separar">
      <div class="izquierda">
            <div class="titulo">
            Alcoholes a utilizar: <br>
            </div>
            Primer alcohol: <SELECT name="alcohol_1">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM alcohol";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_alcohol'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br>

            Cant. de alcohol: <input type="number" name="CA1"><br>

            Segundo alcohol: <SELECT name="alcohol_2">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM alcohol";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_alcohol'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br> 

            Cant. de alcohol: <input type="number" name="CA2"><br>

            Tercer alcohol: <SELECT name="alcohol_3">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM alcohol";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_alcohol'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br> 

            Cant. de alcohol: <input type="number" name="CA3"><br>
      </div>

      <div class="derecha">  
            <div class="titulo">
            Bebidas a utilizar: <br>
            </div>
            Primera bebida: <SELECT name="bebida_1">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM bebidas";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_bebida'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br>

            Cant. de bebida: <input type="number" name="CB1"><br>

            Segunda bebida: <SELECT name="bebida_2">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM bebidas";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_bebida'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br> 

            Cant. de bebida: <input type="number" name="CB2"><br>

            Tercera bebida: <SELECT name="bebida_3">
            <?php

            //Hem de recuperar les dades de Paises.

            //Connexió al servidor de bases de dades

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



            // Realitzem la consulta SQL tal com vàrem veure en el primer capítol.

            $sql = "SELECT * FROM bebidas";



            if ($resultado = $mysqli->query($sql)) {

                  //initcialitzem un array

                  while ($registro=$resultado->fetch_assoc()) {

                        echo '<OPTION VALUE="'.$registro['id_bebida'].'">'.$registro['nombre'].'</OPTION>';

                  }                

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

            </SELECT><br> 

            Cant. de bebida: <input type="number" name="CB3"><br>
      </div>
  </div>

  <div class="separar">
      <input type="submit" value="Guardar datos">
      <button><a href="/curs-pimec/Admin/inicio.php">Volver</a></button>
  </div>


  </form>


</body>

</html>