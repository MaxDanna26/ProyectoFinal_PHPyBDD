<html>
<head>
<title>Ejemplo de insertar Alcoholes</title>
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
  input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    background-color: #f0f0f0; /* Color gris de los campos */
    border-radius: 5px;
    border: none;
  }

  /* Estilos del botón submit */
  input[type="submit"],button,a{
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

  
  button,a{text-decoration: none;}
  .separar{
    display: flex;
    justify-content: space-between;
  }
</style>

</head>

<body>
<form action='modificarBackend.php'.php method='POST'>
<!-- // Realitzem la consulta SQL, tal com varem veure en el primer capitol. -->
<?php 
  //inicialitzem la sessio

  session_start();

 

//Recuperem les dades de l'url. En aquest cas utilitzarem GET.
$tabla=$_POST['tabla'];
$elemento=$_POST['elemento'];
$id_elemento=$_POST['elemento'];
// $registro=$_POST['registro'];

//Connexio   al servidor de bases de dades
//$mysqli = new mysqli(servidor, usuari, password, bbdd);
$mysqli = new mysqli('localhost', 'root', '', 'gestion_alcohol');
if ($mysqli->connect_errno) {
// Comprovem si ens dona un error. Si hi ha error donem els seguents missatges:
echo "Error de conexion.";
echo "Error: Fallo al conectarse a MySQ: \n";
echo "Error: " . $mysqli->connect_errno . "\n";
echo "Error: " . $mysqli->connect_error . "\n";
exit;
// Amb exit; sortim del programa
}
//Especifiquem que les consultes ens retornin una codificacio utf-8
$mysqli->set_charset("utf8");


$sql = "SELECT * FROM `".$tabla."` WHERE `id_".$tabla."`=".$id_elemento;
if ( $resultado=$mysqli->query($sql)) {
$registro=$resultado->fetch_assoc();

if($tabla == 'camarero' || 'coctails' || 'usuarios' || 'preparacioncoctails'){
  echo "<form action='modificarBackend.php' method='POST'>";"<br>";
foreach($registro as $key => $value){
    echo $key.": <input type='text' name=".$key." value=".$value."> <br>";
  }}
?>


<div class="separar">
<input type="hidden" name="tabla" value="<?php echo $tabla ?>">
<input type="hidden" name="elemento" value="<?php echo $elemento ?>">
<input type="hidden" name="id_elemento" value="<?php echo $id_elemento ?>">
<input type="submit" value="Guardar datos">
<button><a href="/curs-pimec/Admin/inicio.php">Volver</a></button>
</div>
</form>

</body>
</html>
<?php
}
else {
echo "Error de MySQL debido a: \n";
echo $mysqli->error . "\n";
}