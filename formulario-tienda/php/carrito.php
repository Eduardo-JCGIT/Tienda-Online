<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basededatos = "tiendajuegos";
//variables paa la conexion de la base de datos

$conn = mysqli_connect($servidor, $usuario, $password, $basededatos);
//si no hay conexion nos mostrara el error
if(!$conn){
  die("No hay conexion de base de datos".mysqli_connect_error());
}

$db = mysqli_select_db( $conn, $basededatos ) or die ( "Error" );

    $nombreProducto=@$_POST['nombreProducto'];
    $precio=@$_POST['precio'];
    $btn=@$_POST['addCarrito'];

if ($btn=="addCarrito") {
    
    $queryregistrar="Insert into carrito(nombreProducto, precio) 
    values('".$nombreProducto."','.$precio.')";

    $resultado = mysqli_query( $conn, $queryregistrar ) or die ( "Salio mal");

    $query="Select * from carrito";
    $resul = mysqli_query( $conn, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
}

  


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="icon" href="../icon/savings.png" />
  </head>
  <body>
    <header>
      <div class="header-titulo">
        <h1>
          Shooping
          <h1 class="color-letra-decoracion">Game</h1>
        </h1>
      </div>
      <nav>
        <a href="../pag/paginatienda.html">Videojuegos</a>
        <a href="../pag/Consolas.html">Consolas</a>
        <a href="#">Accesorios</a>
        <a href="#">Complementos</a>
        <a href="../index.html">Cerrar Sesion</a>
        <div class="animation start-home"></div>
      </nav>
      <br />
    </header>

    
    <main>
      <form action="">
        <br>
        <h1 id="sub-centrado">
          Carrito de
          <div class="color-letra-decoracion">Articulos</div>
        </h1>
        <br>
        <form name='formulario' method='post' action='../php/carrito.php'>
        <table border="3" class="contenedor-carrito">
            <tr>
                <td>Selecciona producto</td>
                <td>Producto</td>
                <td>Precio</td>
            </tr>
      <?php      while ($columna = mysqli_fetch_array( $resul )){?>
            <tr>
            <td><input type='checkbox' name='marca[]' value='".$columna['nombreProducto']."'></td>
            <td><?php echo $columna['nombreProducto']; ?></td>
            <td><?php echo $columna['precio']; ?></td>
            </tr>
   <?php } ?>
        </table>
        <br>
        <br>
        <input class="estilo-boton" type='submit' name='submit' value='Eliminar'>
      </form>

      <a href="../pag/paginatienda.html"><button class="estilo-boton" name="devuelta" type="submit" value="devuelta">Seguir comprando</button></a>

        <form action="../pag/factura.html">
      <button class="estilo-boton" name="devuelta" type="submit" value="devuelta">Realizar compra</button>
        </form>

    </main>

  </body>
</html>

<?php 
mysqli_close($conn);
?>

