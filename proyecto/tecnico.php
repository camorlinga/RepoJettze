<?php

    if(isset($_POST['btn1']))
    {
      include("abrir_conexion.php");

      $email = $_POST['email'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $descripcion = $_POST['desc'];

      mysqli_query($conexion, "INSERT INTO $tabla_db1 (nombre,apellido,email,direccion) values ('$nombre','$apellido','$email','$direccion')");
      //La variable $Conexion viene del archivo "Abrir_Conexion", la cual nos conectara a la base de datos
      //y de paso hacemos el registro de datos.
      
      include("cerrar_conexion.php");
      echo "Se insertaron Correctamente";
    }

    if(isset($_POST['btn2']))
    {
      include("abrir_conexion.php");

        $doc = $_POST['doc'];
        if($doc=="") //VERIFICO QUE AGREGEN UN DOCUMENTO OBLIGATORIAMENTE.
          {echo "Digita un documento por favor. (Ej: 123)";}
        else
        {  
          $resultados = mysqli_query($conexion,"SELECT * FROM $tabla_db1 WHERE doc = $doc");
          while($consulta = mysqli_fetch_array($resultados))
          {
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
  ?>