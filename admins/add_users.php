<?php
  require "../conexion.php";

  // Recoger los datos
  $us_nombre = $_POST["us_nombre"];
  $us_usuario = $_POST["us_usuario"];
  $us_contrasena = $_POST["us_contrasena"];
  $us_id_rol = 1;

  // Encriptar la contraseña
  $contrasenaHash = password_hash($us_contrasena, PASSWORD_DEFAULT);

  // Insertar en la base de datos
  $sql = "INSERT INTO usuarios (us_nombre, us_usuario, us_contrasena, us_id_rol)
          VALUES ('$us_nombre', '$us_usuario', '$contrasenaHash', '$us_id_rol')";

  $query = mysqli_query($conectar, $sql);

  if ($query) {
    echo json_encode([
      "status" => "success",
      "message" => "Usuario agregado exitosamente"
    ]);
  } else {
    echo json_encode([
      "status" => "error",
      "message" => "Error al insertar el usuario",
      "error" => mysqli_error($conectar)
    ]);
  }
?>
