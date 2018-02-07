<?php
session_start();
?>

<?php

$host_db = "localhost";
$user_db = "examen";
$pass_db = "examen";
$db_name = "examenweb";
$tbl_name = "credenciales";

$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

$username = $_POST['email'];
$password = $_POST['pwd'];
 
$sql = "SELECT * FROM $tbl_name WHERE email = '$username'";
//echo "$sql";
$result = $conexion->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 echo $row;
 if (password_verify($password, $row['contraseña'])) { 
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['username'];
    echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='index.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($conexion); 
 ?>