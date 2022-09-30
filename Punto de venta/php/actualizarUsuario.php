<html>
<head>
    <title>Actualizar producto</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    
<section class="form-main">
<?php
        
        $usuarioID=$_GET["usuarioID"];

        
        $usuario = "root";
        $password = "";
        $servidor = "localhost";
        $basededatos = "tiendajuegos";

        $conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
        
        $db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
        
    if(isset($_POST['Actualizar'])){
    $usuarioID=@$_POST['usuarioID'];
    $nombre=@$_POST['nombre'];
    $edad=@$_POST['edad'];
    $email=@$_POST['email'];
    $pass=@$_POST['password'];
        
    $query="Update usuarios set 
    nombre='".$nombre."', 
    edad='.$edad.',
    email='".$email."',
    password='".$pass."'
    where usuarioID=".$usuarioID;

    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos usuario");
    header("Location: ../php/eliminarUsuarios.php");
    exit();
    }
        
    
    $query="Select * From usuarios where usuarioID=". $usuarioID;
    $resul = mysqli_query( $conexion, $query ) or die ( "Algo ha ido mal en la consulta a la base de datos al selecionar");
        
    while ($columna = mysqli_fetch_array( $resul )){
        echo "<form name='formulario' method='post' action='../php/actualizarUsuario.php'>";
            echo "ID cliente";
            echo "<input type='text' name='usuarioID' value='".$columna['usuarioID']."'><br><p>";
            echo "Nombre del producto";
            echo "<input type='text' name='nombre' value='".$columna['nombre']."'><br><p>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;edad";
            echo "<input type='text' name='edad' value='".$columna['edad']."'><br><p>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;email";
            echo "<input type='text' name='email' value='".$columna['email']."'><br><p>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;password";
            echo "<input type='text' name='password' value='".$columna['password']."'><br><p>";
            echo "<br>";
            echo "<br>";
            echo "<input type='submit' class='estilo-boton' name='Actualizar' value='Actualizar'>";
        echo "</form>";
    }  
        
    
    ?>
    </section>
</body>
</html>