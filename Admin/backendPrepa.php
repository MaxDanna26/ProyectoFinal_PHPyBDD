<style>
    body{
        background-color:  #6c6fc6;
    }

    .centrar{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 8rem;
    }

    h1{
        color: white;
    }

    button,a{
        text-decoration: none;
        border-radius: .4rem;
        background-color: red;
    }

    
</style>
<?php

$nombrePrepa=$_POST['nombrePrepa'];
$alcohol_1=$_POST['alcohol_1'];
$CA1=$_POST['CA1'];

$alcohol_2=$_POST['alcohol_2'];
$CA2=$_POST['CA2'];

$alcohol_3=$_POST['alcohol_3'];
$CA3=$_POST['CA3'];

$bebida_1=$_POST['bebida_1'];
$CB1=$_POST['CB1'];

$bebida_2=$_POST['bebida_2'];
$CB2=$_POST['CB2'];

$bebida_3=$_POST['bebida_3'];
$CB3=$_POST['CB3'];
//Conexió al servidor de bases de dades
//$mysqli = new mysqli(servidor, usuari, password, bbdd);
$mysqli = new mysqli('localhost', 'root', '', 'gestion_alcohol');

if ($mysqli->connect_errno) {
// Comprobem si ens dona un error. Si hi ha error donem els següents missatges:
    echo "Error de conexión.";
   	echo "Error: Fallo al conectarse a MySQ: \n";
    echo "Error: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
    // Amb exit; sortim del programa
}	

//Especifiquem que les consultes en retorni una codificació utf-8
$mysqli->set_charset("utf8");

// Realitzem la consulta SQL tal com varem veure en el primer capítol.
$sql = "INSERT INTO `preparacioncoctails` (`id_preparacioncoctails`, `nombre`, `alcohol_1`, `CA1`, `alcohol_2`, `CA2`, `alcohol_3`, `CA3`, `bebida_1`, `CB1`, `bebida_2`, `CB2`, `bebida_3`, `CB3`)
VALUES (NULL, '$nombrePrepa','$alcohol_1','$CA1','$alcohol_2','$CA2','$alcohol_3','$CA3','$bebida_1','$CB1','$bebida_2','$CB2','$bebida_3','$CB3')";


if ( $mysqli->query($sql)) { 
        echo
        "<div class='centrar'>
        <h1>Fila insertada</h1>
        <button><a href='/curs-pimec/Admin/agregarAlcohol.php'>Volver</a></button>
        </div>";
    }
else {
	echo "Error de MySQL debido a: \n";
    echo  $mysqli->error . "\n";			
}
$mysqli->close();
?>