<?php
  require "conexion.php";

  // Permitir solicitudes AJAX
  header('Content-Type: application/json');

  // Obtener y limpiar los datos del formulario
  $us_usuario = addslashes(trim($_POST["us_usuario"] ?? ''));
  $us_contrasena = addslashes(trim($_POST["us_contrasena"] ?? ''));

  // Validación básica de campos vacíos
  if (empty($us_usuario) || empty($us_contrasena)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    exit;
  }

  // Validar reCAPTCHA
  $recaptcha_secret = "6LcYbDcrAAAAAFEG0ta-KUUsCigyPIu01SFVdSz1";
  $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';

  if (!$recaptcha_response) {
    echo json_encode(['success' => false, 'message' => 'Por favor, completa el reCAPTCHA.']);
    exit;
  }

  $verify_response = file_get_contents(
    "https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response"
  );

  $response_data = json_decode($verify_response);
  if (!$response_data->success) {
    echo json_encode(['success' => false, 'message' => 'reCAPTCHA inválido.']);
    exit;
  }

  // Buscar usuario
  $sql = "SELECT * FROM usuarios WHERE us_usuario = '$us_usuario'";
  $resultado = mysqli_query($conectar, $sql);

  if (!$resultado) {
    echo json_encode(['success' => false, 'message' => 'Error al consultar la base de datos.']);
    exit;
  }

  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $hash = $fila["us_contrasena"];

    if (password_verify($us_contrasena, $hash)) {
      session_start();
      $_SESSION["autentificado"] = "SI";
      $_SESSION["us_nombre"] = $fila["us_nombre"];
      echo json_encode(['success' => true]);
    } else {
      echo json_encode(['success' => false, 'message' => 'Usuario y/o contraseña incorrecta.']);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Usuario y/o contraseña incorrecta.']);
  }

  mysqli_free_result($resultado);
  mysqli_close($conectar);
?>