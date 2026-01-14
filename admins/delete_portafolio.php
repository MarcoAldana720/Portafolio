<?php
  require "../conexion.php";
  $port_id = $_GET['id'];

  echo $port_id;

  $eliminar ="DELETE FROM portafolio WHERE port_id='$port_id'";
  $resultado = mysqli_query($conectar, $eliminar);

  if($resultado) {
    header("location: index.php");
  } else {
    echo "No se pudo eliminar los datos";
  }
?>