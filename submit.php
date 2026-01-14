<?php
  // Importar manualmente los archivos de PHPMailer
  require 'PHPMailer/PHPMailer/PHPMailer.php';
  require 'PHPMailer/PHPMailer/SMTP.php';
  require 'PHPMailer/PHPMailer/Exception.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  // Configurar cabecera JSON para que AJAX entienda la respuesta
  header('Content-Type: application/json');

  // Solo permitir solicitudes POST
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Variables del formulario
    $name    = $_POST["name"] ?? '';
    $email   = $_POST["email"] ?? '';
    $subject = $_POST["subject"] ?? '';
    $message = $_POST["message"] ?? '';

    // Variables para Captchat
    $ip = $_SERVER['REMOTE_ADDR'];
    $secretkey = "6LcYbDcrAAAAAFEG0ta-KUUsCigyPIu01SFVdSz1";
    $captcha = $_POST['g-recaptcha-response'];

    // Verificamos la respuesta del captcha
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
    $atributos = json_decode($response, true);

    // Verificar si el captcha fue exitoso
    if (!$atributos['success']) {
      echo json_encode([
        'success' => false,
        'message' => 'Verificación de reCAPTCHA fallida.'
      ]);

      exit;
    }

    // Configuración para el envio del formulario
    $mail = new PHPMailer(true);

    try {
      // Configuración del servidor SMTP
      $mail->isSMTP();
      $mail->Host = 'smtp-marcoaldana.alwaysdata.net';
      $mail->SMTPAuth = true;
      $mail->Username = 'marcoaldana@alwaysdata.net';
      $mail->Password = 'M4rco12345+';
      // $mail->Password   = 'gnsldqicyuzfsnli';
      $mail->SMTPSecure = 'ssl';
      $mail->Port = 465;

      // Remitente y destinatario
      $mail->setFrom('marcoaldana@alwaysdata.net', 'Contacto Desde Portafolio');
      $mail->addAddress('marcoaldana@alwaysdata.net', 'Mi Sitio Web');

      // Contenido del correo
      $mail->isHTML(true);
      $mail->Subject = "Contacto Desde Portafolio";
      $mail->Body = "
        <strong>Nombre:</strong> $name<br>
        <strong>Correo:</strong> $email<br>
        <strong>Asunto:</strong> $subject<br>
        <strong>Mensaje:</strong><br>".nl2br($message);
      $mail->send();

      echo json_encode(['success' => true]);
    } catch (Exception $e) {
      echo json_encode([
        'success' => false,
        'message' => "No se pudo enviar el correo. Error: {$mail->ErrorInfo}"
      ]);
    }
  } else {
    echo json_encode([
      'success' => false,
      'message' => 'Método no permitido'
    ]);
  }
?>
