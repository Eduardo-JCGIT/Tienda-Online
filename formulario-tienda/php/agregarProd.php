<?php

  //variables para concetarse a la bd
  $servidor = "localhost";
  $usuario = "root";
  $password = "";
  $basededatos = "tiendajuegos";
	// creación de la conexión a la base de datos con mysql_connect()

$conn = mysqli_connect($servidor, $usuario, $password, $basededatos);
  //si no hay conexion nos mostrara el error
  if(!$conn){
    die("No hay conexion de base de datos".mysqli_connect_error());
  }

  $db = mysqli_select_db( $conn, $basededatos ) or die ( "Error" );

  $nombrejuego=@$_POST['nombrejuego'];
  $precio=@$_POST['precio'];
  $disponible=@$_POST['disponible'];
  $btn=@$_POST['agregarprod'];


if ($btn=="agregarprod"){
  $queryregistrar="Insert into juegos(nombrejuego, precio, disponible) 
  values('".$nombrejuego."','.$precio.','.$disponible.')";
  
  $resultado = mysqli_query( $conn, $queryregistrar ) or die ( "Salio mal");
  
  header("Location: ../pag/prodExt.html");
  }

  mysqli_close( $conn);
?>