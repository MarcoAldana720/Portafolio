<?php
  require "../conexion.php";

  $port_titulo = $_POST["port_titulo"];
  $port_descripcion = $_POST["port_descripcion"];
  $port_link = $_POST["port_link"];
  $port_id_estado = $_POST["port_id_estado"];
  $port_id_tipo = $_POST["port_id_tipo"];
  $port_id_usuario = $_POST["port_id_usuario"];
  $port_id_tecnologias = $_POST["port_id_tecnologias"];

  // Subir foto
  $rutaServidor = "img";
  $nombreImagen = $_FILES['port_foto']['name'];
  $rutaTemporal = $_FILES['port_foto']['tmp_name'];
  $pesofoto = $_FILES['port_foto']['size'];
  $tipofoto = $_FILES['port_foto']['type'];

  date_default_timezone_set('UTC');
  $nombreimagenunico = date('Y-m-d-h-i-s') . "_" . $nombreImagen;
  $ruta_destino = $rutaServidor . "/" . $nombreimagenunico;

  // Validar formato de imagen
  $formatos_permitidos = ["image/jpeg", "image/png", "image/webp", "image/gif", "image/jpg", "image/svg"];
  if (in_array($tipofoto, $formatos_permitidos) || empty($tipofoto)) {
    move_uploaded_file($rutaTemporal, $ruta_destino);
  } else {
    echo '<script>
        alert("EL ARCHIVO QUE ADJUNTÓ NO ES UNA IMAGEN");
        window.history.go(-1);
    </script>';
    exit;
  }

  // Insertar portafolio
  $sql = "INSERT INTO portafolio (port_titulo, port_descripcion, port_link, port_foto, port_id_tipo, port_id_estado, port_id_usuario)
          VALUES ('$port_titulo', '$port_descripcion', '$port_link','$ruta_destino', '$port_id_tipo', '$port_id_estado', '$port_id_usuario')";

  $query = mysqli_query($conectar, $sql);

  if ($query) {
    // Obtener el ID del portafolio recién insertado
    $portec_id_portafolio = mysqli_insert_id($conectar);

    // Insertar tecnologías asociadas en la tabla intermedia
    foreach ($port_id_tecnologias as $portec_id_tecnologia) {
      $sql_tecnologia = "INSERT INTO portafolio_tecnologias (portec_id_portafolio, portec_id_tecnologia) VALUES ('$portec_id_portafolio', '$portec_id_tecnologia')";
      mysqli_query($conectar, $sql_tecnologia);
    }

    echo '<script>
        alert("SE GUARDÓ CORRECTAMENTE");
        location.href="index.php";
    </script>';
  } else {
    echo '<script>
        alert("FALLO, NO SE GUARDARON LOS DATOS");
        location.href="index.php";
    </script>';
  }
?>