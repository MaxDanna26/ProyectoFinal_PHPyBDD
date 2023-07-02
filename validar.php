<html>

      <head>

            <meta charset="utf-8">

            <link rel="stylesheet" href="estilos.css">

      </head>

      <body>

            <?php

            //inicialitzem la sessio

            session_start();

            //Recuperem les dades del formulari de login

            $username = $_POST['username'];

            $password = $_POST['password'];

            $admin = 'maxDanna';

            //Connectem amb la base de dades

            $mysqli = new mysqli('localhost', 'root', '', 'gestion_alcohol');

            if ($mysqli->connect_errno) {

                  echo "La aplicacion no responde.";

                  echo "Error: Fallo al conectarse a MySQL debido a: \n";

                  echo "Error: " . $mysqli->connect_errno . "\n";

                  echo "Error: " . $mysqli->connect_error . "\n";

                  exit;

                  }

            //Comprovem si l'usuari existeix a la base de dades.

            //A la mateixa consulta seleccionem password, valor_cookie i data de connexio.

            $sql = "SELECT password,cookie,fecha FROM Usuarios WHERE username LIKE '".$username."'";

            if (!$resultado = $mysqli->query($sql)) {

            echo "Lo sentimos, este sitio web esta experimentando problemas.";

            echo "Error: La ejecucion de la consulta fallo debido a: \n";

            echo "Query: " . $sql . "\n";

            echo "Error: " . $mysqli->errno . "\n";

            echo "Error: " . $mysqli->error . "\n";

            exit;

                  }    

            //Si no existeix username donem un error.

            if ($resultado->num_rows === 0) {

            echo "Lo sentimos. No se pudo encontrar una coincidencia para el username ".$username.". Intentelo de nuevo.";

            exit;

            }
            //Ara estem segurs que existeix i que tenim un unic resultat.

            //Associem a la taula $usuario el registre del resultat.

            $usuario = $resultado->fetch_assoc();

            if (!($password==$usuario['password'])) {

            echo '<p class="error">Usuario y password no validos</p>';

            }

            else {

                  //Guardem a $SESSION l'username.

                  $_SESSION['username'] = $username;

                  //Guardarem a la taula usuarios l'id de la sessio a valor_cookie i la data de connexio.

                  $sql ="UPDATE Usuarios SET cookie='".session_id()."',fecha=now() WHERE username LIKE '".$username."'";

                  if ($mysqli->query($sql) === TRUE) {

                        if (($username == $admin)) {
                              header("Location: Admin/inicio.php");
                          } else {
                              header("Location: Public/inicioPublic.php");
                          }
                  }
                  else{

                        echo "Error updating record: " . $mysqli->error;

                  }

            }

            $mysqli->close();

            ?>         

      </body>

</html>