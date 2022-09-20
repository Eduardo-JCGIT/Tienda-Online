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

  $nom=@$_POST['nombre'];
  $edad=@$_POST['edad'];
  $email=@$_POST['email'];
  $pass=@$_POST['password'];
  $btn=@$_POST['crear'];


 /* if (isset($_POST['crear'])) 
  {
    $queryregistrar="Insert into usuarios(nombre, edad, email, password) 
    values(".$nom.",'".$edad."','".$email."','".$pass."')";

    if(mysqli_query($conn,$queryregistrar))
    {
      header("Location: ../pag/CuentaExitosa.html");
    } 
    else
    {
      echo "Error: ".$queryregistrar."<br>".mysql_error($conn);
    }
}
*/

if ($btn=="crear"){
  $queryregistrar="Insert into usuarios(nombre, edad, email, password) 
  values('".$nom."','.$edad.','".$email."','".$pass."')";
  
  $resultado = mysqli_query( $conn, $queryregistrar ) or die ( "Salio mal");
  
  header("Location: ../pag/CuentaExitosa.html");
  }

  mysqli_close( $conn);
?>