
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
  
    if(isset($_POST['submit'])){
        if(!empty($_POST['marca'])){
                foreach($_POST['marca'] as $selected){
                }
            }

        $query="Delete From usuarios where usuarioID=". $selected ;
        $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    }
    if(isset($_POST['Modificar'])){
      if(!empty($_POST['marca'])){
                foreach($_POST['marca'] as $selected){
                }
            }
     header("Location: ../php/actualizarUsuario.php?usuarioID=". $selected);

    }
    
      
    $query="Select * From usuarios";
    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    
    

  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<form name='formulario' method='post' action='../php/eliminarUsuarios.php'>";
  echo "<table border='1'>";
  echo "<tr>";
  echo "<td>Selecciona</td>";
  echo "<td>Id usuario</td>";
  echo "<td>Nombre</td>";
  echo "<td>Edad</td>";
  echo "<td>Email</td>";
  echo "<td>Contraseña</td>";
  echo "</tr>";
 while ($columna = mysqli_fetch_array( $resul )){
     echo "<tr>";
     echo "<td><input type='checkbox' name='marca[]' value='".$columna['usuarioID']."'></td>";
     echo "<td>".$columna['usuarioID']."</td>";
     echo "<td>".$columna['nombre']."</td>";
     echo "<td>".$columna['edad']."</td>";
     echo "<td>".$columna['email']."</td>";
     echo "<td>".$columna['password']."</td>";
     echo "</tr>";
 }
 echo "</table>";
 echo "<br>";
 echo "<input type='submit' class='estilo-boton' name='Modificar' value='Modificar'>&nbsp;&nbsp;";
 echo "<input type='submit' class='estilo-boton' name='submit' value='Eliminar'>&nbsp;&nbsp;";
 echo "</form>";
 echo "<br>";


mysqli_close( $conexion );

?>
</section>

</body>
</html>