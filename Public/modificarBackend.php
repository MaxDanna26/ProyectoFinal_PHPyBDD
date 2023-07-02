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
//Recuperem totes les dades del formulari ejemplo17.php
$tabla=$_POST['tabla'];

switch ($tabla) {
    case 'usuarios':
        $id_usuarios=$_POST['id_usuarios'];
        $nombre=$_POST['nombre'];
        $username=$_POST['username'];
        $Password=$_POST['Password'];
        $cookie=$_POST['cookie'];
        $fecha=$_POST['fecha'];
        $id_camarero=$_POST['id_camarero'];
        break;
    case 'alcohol':
        $nombre=$_POST['nombre'];
        $fechaVencimiento=$_POST['fechaVencimiento'];
        $cantML=$_POST['cantML'];
        $precio=$_POST['precio'];
        $id_elemento=$_POST['elemento'];
        break;
    case 'bebidas':
        $nombre=$_POST['nombre'];
        $fechaVencimiento=$_POST['fechaVencimiento'];
        $cantML=$_POST['cantML'];
        $precio=$_POST['precio'];
        $id_elemento=$_POST['elemento'];
        break;
    case 'camarero':
        $id_camarero=$_POST['id_camarero'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        break;
    case 'coctails':
        $id_coctails=$_POST['id_coctails'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $id_prepa=$_POST['id_prepa'];
        break;
    case 'preparacioncoctails':
        $id_preparacioncoctails=$_POST['id_preparacioncoctails'];
        $nombre=$_POST['nombre'];
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
        break;

}
//Connexio al servidor de bases de dades
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
//Especifiquem que les consultes ens retornin una codificació utf-8
$mysqli->set_charset("utf8");

// Realitzem la consulta SQL, tal com vrem veure en el primer captol.
    switch ($tabla) {
        case 'usuarios':
            $sql = "UPDATE `".$tabla."` SET `id_usuarios`='".$id_usuarios."',`nombre` = '".$nombre."',`username`='".$username."',`Password`='".$Password."',`cookie`='".$cookie."',`fecha`='".$fecha."',`id_camarero`='".$id_camarero."' WHERE `$tabla`.`id_$tabla` = ".$id_usuarios;
            break;
        case 'alcohol':
            $sql = "UPDATE `".$tabla."` SET `nombre` = '".$nombre."',`fechaVencimiento`='".$fechaVencimiento."',`cantML`='".$cantML."',`precio` = '".$precio."' WHERE `$tabla`.`id_$tabla` =" .$id_elemento;
            break;
        case 'bebidas':
            $sql = "UPDATE `".$tabla."` SET `nombre` = '".$nombre."',`fechaVencimiento`='".$fechaVencimiento."',`cantML`='".$cantML."',`precio` = '".$precio."' WHERE `$tabla`.`id_$tabla` =" .$id_elemento;
            break;
        case 'camarero':
            $sql = "UPDATE `".$tabla."` SET `id_camarero`='".$id_camarero."',`nombre` = '".$nombre."',`apellido`='".$apellido."' WHERE `$tabla`.`id_$tabla` = ".$id_camarero;
            break;
        case 'coctails':
            $sql = "UPDATE `".$tabla."` SET `id_coctails` = '".$id_coctails."',`nombre`='".$nombre."',`precio` = '".$precio."',`id_prepa` = '".$id_prepa."' WHERE `$tabla`.`id_$tabla` =" .$id_coctails;
            break;
        case 'preparacioncoctails':
            $sql = "UPDATE `".$tabla."` SET `id_preparacioncoctails` = '".$id_preparacioncoctails."',`nombre`='".$nombre."',`alcohol_1` = '".$alcohol_1."',`CA1` = '".$CA1."',`alcohol_2` = '".$alcohol_2."',`CA2` = '".$CA2."' ,`alcohol_3` = '".$alcohol_3."',`CA3` = '".$CA3."',`bebida_1` = '".$bebida_1."',`CB1` = '".$CB1."',`bebida_2` = '".$bebida_2."',`CB2` = '".$CB2."',`bebida_3` = '".$bebida_3."',`CB3` = '".$CB3."' WHERE `$tabla`.`id_$tabla` =" .$id_preparacioncoctails;
            break; 
    }
if ( $mysqli->query($sql)) {
    echo
    "<div class='centrar'>
    <h1>Fila modificada</h1>
    <button><a href='/curs-pimec/Public/inicioPublic.php'>Volver</a></button>
    </div>"
    ;}
else {
 echo "Error de MySQL debido a: \n";
 echo $this->db->error . "\n";
}

$mysqli->close();
?>