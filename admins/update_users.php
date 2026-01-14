<?php
require "../conexion.php";

// Habilitar JSON en la respuesta
header('Content-Type: application/json');

// Verificar si el método es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode([
    "status" => "error",
    "message" => "Método no permitido, usa POST."
  ]);
  exit;
}

// Validar que llegue el ID
if (!isset($_POST["us_id"])) {
  echo json_encode([
    "status" => "error",
    "message" => "Falta el ID del usuario (us_id)."
  ]);
  exit;
}

$us_id = $_POST["us_id"];

// Opcionales (solo se actualizan si vienen)
$us_nombre = isset($_POST["us_nombre"]) ? $_POST["us_nombre"] : null;
$us_usuario = isset($_POST["us_usuario"]) ? $_POST["us_usuario"] : null;
$us_contrasena = isset($_POST["us_contrasena"]) ? $_POST["us_contrasena"] : null;

// ----- Construcción dinámica del UPDATE -----
$updates = [];

// Nombre
if (!empty($us_nombre)) {
  $updates[] = "us_nombre = '$us_nombre'";
}

// Usuario
if (!empty($us_usuario)) {
  $updates[] = "us_usuario = '$us_usuario'";
}

// Contraseña: si viene, se encripta
if (!empty($us_contrasena)) {
  $contrasenaHash = password_hash($us_contrasena, PASSWORD_DEFAULT);
  $updates[] = "us_contrasena = '$contrasenaHash'";
}

// Si no hay campos para actualizar
if (count($updates) === 0) {
  echo json_encode([
    "status" => "error",
    "message" => "No se enviaron campos para actualizar."
  ]);
  exit;
}

// Unir los campos para el SQL
$setSQL = implode(", ", $updates);

// Query final
$sql = "UPDATE usuarios SET $setSQL WHERE us_id = '$us_id'";

$query = mysqli_query($conectar, $sql);

if ($query) {
  echo json_encode([
    "status" => "success",
    "message" => "Usuario actualizado correctamente."
  ]);
} else {
  echo json_encode([
    "status" => "error",
    "message" => "Error al actualizar el usuario.",
    "error" => mysqli_error($conectar)
  ]);
}
?>