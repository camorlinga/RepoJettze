<html>
<head>
  <title>Verificacion</title>
  <!-- Latest compiled and minified CSS -->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron ">
  <div class="col-md-12 center"></div>
  <div class="col-md-12 center">



     <div class="jumbotron text-center"><h1>Verificacion de Registro</h1>
        </div>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Tecno Solutions</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.html">Inicio</a></li>
      <li class="active"><a href="#" >Registrar Fallo</a></li>
      
    </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav>

    <form method="POST" action="verificar.php" >

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" id="email" >
  </div>

  <div class="form-group">
      <label for="nomb">Nombre </label>
      <input type="text" name="nombre" class="form-control" id="nombre" >
  </div>


	
   <div class="form-group">
      <label for="dir">Apellido </label>
      <input type="text" name="apellido" class="form-control" id="dir">
  </div>
  <div class="form-group">
      <label for="tel">Descripcion </label>
      <input type="text" name="desc" class="form-control" id="tel">
  </div>
    
    <center>
      <input type="submit" value="Enviar" class="btn btn-success" name="btn1">
      <input type="submit" value="Consultar" class="btn btn-info" name="btn2">
      <input type="submit" value="Generar Reporte" class="btn btn-warning" name="btn3">
    </center>

  </form>



  <?php

    if(isset($_POST['btn1']))
    {
    	$email = $_POST['email'];
 if($email==""){
echo "No has ingresado nada en el Campo Email... Rellena este campo con el formato: Email@ejemplo.com ";

 }else{

 	include("abrir_conexion.php");

      $email = $_POST['email'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $descripcion = $_POST['desc'];
		$rol = "usuario";
      mysqli_query($conexion, "INSERT INTO $tabla_db1 (nombre,apellido,email,rol,descripcion) values ('$nombre','$apellido','$email','$rol','$descripcion')");
      //La variable $Conexion viene del archivo "Abrir_Conexion", la cual nos conectara a la base de datos
      //y de paso hacemos el registro de datos.
      
      include("cerrar_conexion.php");
      echo "Se insertaron Correctamente";

 }
      
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $email = $_POST['email'];
        if($email==""){ //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
           $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1");

           echo "
           <div>
      <table class=\"table\" border= \"1\">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Descripcion</th>
      </tr>
    </thead></table></div>
                          " ;

           while($consulta = mysqli_fetch_array($resultados)){  
           echo"
             <div > <table class=\"table\"\" border= \"0\">
                
                <tbody>
      <tr>
        <td><textarea name=\"\" id=\"\" cols=\"20\" rows=\"1\" disabled=\"true\">".$consulta["nombre"]."</textarea></td>
      <td><textarea name=\"\" id=\"\" cols=\"20\" rows=\"1\" disabled=\"true\">".$consulta["apellido"]."</textarea></td>    
      <td><textarea name=\"\" id=\"\" cols=\"20\" rows=\"1\" disabled=\"true\">".$consulta["email"]."</textarea></td>    
      <td><textarea name=\"\" id=\"\" cols=\"20\" rows=\"1\" disabled=\"true\">".$consulta["rol"]."</textarea></td>    
      <td><textarea name=\"\" id=\"\" cols=\"20\" rows=\"1\" disabled=\"true\">".$consulta["descripcion"]."</textarea></td>
      </tr>
               
      
    </tbody>
  </table>
             </div>
            ";
        }

    }
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE email = $email");

          while($consulta = mysqli_fetch_array($resultados)){
            echo 
            "
              <table width=\"100%\" border=\"1\">
                <tr>
                  <td><b><center>Documento</center></b></td>
                  <td><b><center>Nombre</center></b></td>
                  <td><b><center>Direccion</center></b></td>
                  <td><b><center>Telefono</center></b></td>
                </tr>
                <tr>
                  <td>".$consulta['email']."</td>
                  <td>".$consulta['nombre']."</td>
                  <td>".$consulta['apellido']."</td>
                  <td>".$consulta['descripcion']."</td>
                </tr>
              </table>
            ";
          }
        }

      include("cerrar_conexion.php");
    }
    if((isset($_POST['btn3']))){
      // AQUI ES DONDE NO ME MUESTRA EL PDF CORRECTAMENTE INGE... YA MANDE LLAMAR EL PHP Y LE DESIGNO VARIABLES MAS ABAJO PERO SIGUE IGUAL...
      include("abrir_conexion.php");

require('MPDF57/mpdf.php');
$mpdf = new mPDF('c','A4');
$mpdf->writeHTML($html);
$mpdf->Output('reporte.pdf','I');
$html = '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cosa</title>
</head>
<body>
  <p>holaa</p>
</body>
</html>'; 


include("cerrar_conexion.php");
    }
  ?>



  </div>
  <div class="col-md-4"></div>
</div>



  
  
</body>
</html>