<html>

<head>

      <meta charset="utf-8">

      <link rel="stylesheet" href="estilos.css">

</head>

<body>

<?php

 

//Comprovem si la persona es pot connectar

session_start();

/*** COMPROVACIO CONNEXIo *****/

$mysqli = new mysqli('localhost', 'root', '', 'gestion_alcohol');

if ($mysqli->connect_errno) {

      echo "Error a la web";

      echo "Error: " . $mysqli->connect_error . "\n";

      exit;

}

$sql = "SELECT username,fecha FROM Usuarios WHERE cookie='".session_id()."' and date_add(fecha, INTERVAL 1 DAY) > now()";

if (!$resultado = $mysqli->query($sql)) {

      echo "Error a la web";

      echo "Error: " . $mysqli->connect_error . "\n";

      exit;

}

if ($resultado->num_rows === 0) {

      echo "Lo conexion a esta sesion no es valida.";

      exit;

}

/***** FINAL COMPROVACIO CONNEXIO *****/

 

 

//Recuperem el valor de l'username de la taula $_SESSION.

//Aquest valor es va guardar al proces validar.php.

echo "<p class=success>Felicidades ".$_SESSION['username'].", esta identificado!</p>";

?>
 <h1 class="pregunta">Que deseas hacer?</h1>
<div class="recuadro">

<a href="/curs-pimec/Public/consultar.php"><button>Consultar Datos</button></a>
<a href="/curs-pimec/Public/modificarAdmin.php"><button>Modificar</button></a>
    
</div>


</body>

</html>