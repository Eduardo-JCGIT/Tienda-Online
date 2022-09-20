<html>
<head>
    <title>Actualizar producto</title>
</head>
<body>
    

<?php
        
        $id=$_GET["id"];

        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "tiendajuegos";

        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
        
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        
    if(isset($_POST['Actualizar'])){
    $id=@$_POST['id'];
    $nombrejuego=@$_POST['nombrejuego'];
    $precio=@$_POST['precio'];
        
    $query="Update juegos set 
    nombrejuego='".$nombrejuego."', 
    precio='.$precio.'
    where id=".$id;

    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
    header("Location: ../php/productoEliminacion.php");
    exit();
    }
        
    $query="Select * From juegos where id=". $id;
    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos");
        
    while ($columna = mysqli_fetch_array( $resul )){
        echo "<form name='formulario' method='post' action='../php/productoActualizar.php'>";
            echo "ID producto";
            echo "<input type='text' name='id' value='".$columna['id']."'><br><p>";
            echo "Nombre del producto";
            echo "<input type='text' name='nombrejuego' value='".$columna['nombrejuego']."'><br><p>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;precio";
            echo "<input type='text' name='precio' value='".$columna['precio']."'><br><p>";
            echo "<br>";
            echo "<br>";
            echo "<input type='submit' name='Actualizar' value='Actualizar'>";
        echo "</form>";
    }  
        
    
    ?>
</body>
</html>