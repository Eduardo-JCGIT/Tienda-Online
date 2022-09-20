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

$email=@$_POST['email'];
$pass=@$_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE email = '".$email."' and password = '".$pass."'");
$nr = mysqli_num_rows($query);
if ($nr == 1){
  header("Location: ../pag/paginatienda.html");
  //echo "Bienvenido: ".$email;
}
else if($nr == 0){

  echo "No ingreso";
}

mysqli_close( $conexion );
?>