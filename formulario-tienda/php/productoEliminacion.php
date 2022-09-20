
<html>
<head>
<title>Actualizar Producto</title>
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
  
    if(isset($_POST['submit'])){
        if(!empty($_POST['marca'])){
                foreach($_POST['marca'] as $selected){
                }
            }

        $query="Delete From juegos where id=". $selected ;
        $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    }
    if(isset($_POST['Modificar'])){
      if(!empty($_POST['marca'])){
                foreach($_POST['marca'] as $selected){
                }
            }
     header("Location: ../php/productoActualizar.php?id=". $selected);

    }
    
      
    $query="Select * From juegos";
    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    

  
   
  echo "<form name='formulario' method='post' action='../php/productoEliminacion.php'>";
  echo "<table border='1'>";
  echo "<tr>";
  echo "<td>Selecciona</td>";
  echo "<td>ID producto</td>";
  echo "<td>Producto</td>";
  echo "<td>Precio</td>";
  echo "</tr>";
 while ($columna = mysqli_fetch_array( $resul )){
     echo "<tr>";
     echo "<td><input type='checkbox' name='marca[]' value='".$columna['id']."'></td>";
     echo "<td>".$columna['id']."</td>";
     echo "<td>".$columna['nombrejuego']."</td>";
     echo "<td>".$columna['precio']."</td>";
     echo "</tr>";
 }
 echo "</table>";
 echo "<br>";
 echo "<input class='estilo-boton' type='submit' name='Modificar' value='Modificar'>";
 echo "<input class='estilo-boton' type='submit' name='submit' value='Eliminar'>&nbsp;&nbsp;";
 echo "</form>";

mysqli_close( $conexion );

?>

</section>

</body>
</html>