<html>
<head>
<title>Ejemplo de insertar Bebidas</title>
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

  button,a{text-decoration: none;}
    .separar{
      display: flex;
      justify-content: space-between;
    }

</style>
</head>
<body>
<form action="backendAgregarBebida.php" method="POST">
Nombre: <input type="text" placeholder="Bebida" name="nombre"><br>
Fecha De Vencimiento: <input type="date" name="fechaVencimiento"><br>
Cantidad de ML: <input type="number" placeholder="Cantidad de ML" name="cantML"><br>
Precio: <input type="text" placeholder="Precio" name="precio"><br>


<div class="separar">
<input type="submit" value="Guardar datos">
<button><a href="/curs-pimec/Admin/inicio.php">Volver</a></button>
</div>
</form>
</body>
</html>