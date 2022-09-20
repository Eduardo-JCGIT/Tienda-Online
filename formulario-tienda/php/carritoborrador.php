
<html>
<head>
<title>Consulta</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>
<section class="form-main">
    <div>
    <a href='../pag/pagAdmin.html'><button class='estilo-boton'>Regresa a opciones</button></a>
    </div>
<?php

    $usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "tiendajuegos";

    $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );

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
  
    if(isset($_POST['submit'])){
        if(!empty($_POST['marca'])){
                foreach($_POST['marca'] as $selected){
                }
            }

        $query="Delete From carrito where id=". $selected ;
        $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    }
    if(isset($_POST['Vaciar'])){

        $query="Delete From carrito;
        $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");

    }
    
    $query="Select * From carrito";
    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    

  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<form name='formulario' method='post' action='../php/carritoborrador.php'>";
  echo "<table border='1'>";
  echo "<tr>";
  echo "<td>Selecciona</td>";
  echo "<td>Nombre del producto</td>";
  echo "<td>Precio</td>";
  echo "</tr>";
 while ($columna = mysqli_fetch_array( $resul )){
     echo "<tr>";
     echo "<td><input type='checkbox' name='marca[]' value='".$columna['id']."'></td>";
     echo "<td>".$columna['nombreProducto']."</td>";
     echo "<td>".$columna['precio']."</td>";
     echo "</tr>";
 }
 echo "</table>";
 echo "<br>";
 echo "<input type='submit' class='estilo-boton' name='Vaciar' value='Vaciar'>&nbsp;&nbsp;";
 echo "<input type='submit' class='estilo-boton' name='submit' value='Eliminar'>&nbsp;&nbsp;";
 echo "</form>";
 echo "<br>";


mysqli_close( $conexion );

?>
</section>

</body>
</html>