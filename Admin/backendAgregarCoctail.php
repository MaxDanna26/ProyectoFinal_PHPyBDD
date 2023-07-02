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
//Recuperem les dades del formulari. Com s'ha definit com a POST, podem utilitzar l'array $_POST.
//Si haguessim usat GET, utilitzariem $_GET
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$id_prepa = $_POST['id_prepa'];


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
// Realitzem la consulta SQL, tal com varem veure en el primer capitol.
$sql = "INSERT INTO `coctails` (`id_coctails`, `nombre`, `precio` ,`id_prepa`)
VALUES (NULL, '".$nombre."','".$precio."','".$id_prepa."');";
if ( $mysqli->query($sql)) {
    echo
    "<div class='centrar'>
    <h1>Fila insertada</h1>
    <button><a href='/curs-pimec/Admin/inicio.php'>Volver</a></button>
    </div>";
    }
    else {
    echo "Error de MySQL debido a: \n";
    echo $this->db->error . "\n"; }
    $mysqli->close();
?>