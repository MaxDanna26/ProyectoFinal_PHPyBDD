
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

<div class="centrar margin">
<h1>Que quieres modificar?</h1>

<form method="POST" action="modificar.php">
    <label for="elemento">Seleccione un elemento:</label>

    <select id="elemento" name="elemento">
          <?php
                    //inicialitzem la sessio

                    session_start(); 

                  if (isset($_POST['tabla']) && !empty($_POST['tabla'])) {
                      $tabla = $_POST['tabla'];

                      // Establecer conexión a la base de datos
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "gestion_alcohol";

                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                          die("Error de conexión: " . $conn->connect_error);
                      }

                      // Realizar una consulta para obtener todos los elementos de la tabla seleccionada
                      $sql = "SELECT * FROM $tabla";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option value='" . $row['id_'.$tabla] . "'>" . $row['nombre'] . "</option>";
                          }
                      } else {
                          echo "<option value=''>No se encontraron elementos</option>";
                      }

                      $conn->close();
                  }
                  ?>
    </select>
<input type="hidden" name="tabla" value="<?php echo $tabla ?>">
    <input type="submit" value="Enviar">

  </form>
</div>
