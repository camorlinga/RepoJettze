<?php 

$host = "localhost";
$usuario = "examen";
$clave ="examen";
$db = "examenweb";

$conn = mysqli_connect($host,$usuario,$clave,$db) or die ("Error al conectar");


$nombres = $_POST['nombre'];
	$apellidos = $_POST['apellido'];
	$email = $_POST['email'];
	$rol = $_POST['rol'];
	$desc = $_POST['descripcion'];
	
	$req = (strlen($nombres)*strlen($apellidos)*strlen($email)*strlen($rol)*strlen($desc)) or die("No se han llenado todos los campos");

	

$sql = "INSERT INTO registros (nombre,apellido,email,rol,descripcion) VALUES ('".$nombres."','".$apellidos."','".$email."','".$rol."','".$desc."');";

$r = mysqli_query($conn,$sql);

if ($r) {

	print('Registro generado Exitosamente <br/> <a href= "index.html">Volver</a>');

	# code...
}else{
	print('Error al insertar el registro. <br/> <a href= "index.html">Volver</a> ');
}

	

 ?>