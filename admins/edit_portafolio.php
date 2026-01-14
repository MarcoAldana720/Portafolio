<?php
  require "../conexion.php";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $port_id = $_POST['port_id'];
    $port_titulo = $_POST['port_titulo'];
    $port_descripcion = $_POST['port_descripcion'];
    $port_link = $_POST["port_link"];
    $port_id_tipo = $_POST['port_id_tipo'];
    $port_id_estado = $_POST['port_id_estado'];

    // Ruta de la carpeta de imágenes
    $rutaServidor = "img";

    // Verificar si se subió una nueva imagen
    if (isset($_FILES['port_foto']) && $_FILES['port_foto']['error'] === 0) {
      $nombreImagen = $_FILES['port_foto']['name'];
      $rutaTemporal = $_FILES['port_foto']['tmp_name'];
      $tipofoto = $_FILES['port_foto']['type'];

      // Formatos permitidos
      $formatos_permitidos = ["image/jpeg", "image/png", "image/webp", "image/gif", "image/jpg", "image/svg"];

      if (!in_array($tipofoto, $formatos_permitidos)) {
        echo '<script>
                alert("EL ARCHIVO QUE ADJUNTO NO ES UNA IMAGEN VÁLIDA");
                window.history.go(-1);
              </script>';
        exit;
      }

      // Generar nombre único con fecha
      date_default_timezone_set('UTC');
      $nombreimagenunico = date('Y-m-d-H-i-s') . "_" . $nombreImagen;
      $ruta_destino = $rutaServidor . "/" . $nombreimagenunico;

      // Mover imagen a la carpeta destino
      if (move_uploaded_file($rutaTemporal, $ruta_destino)) {
        // Actualizar con la nueva imagen
        $sql = "UPDATE portafolio SET
                port_titulo = '$port_titulo',
                port_descripcion = '$port_descripcion',
                port_link = '$port_link',
                port_id_tipo = '$port_id_tipo',
                port_foto = '$ruta_destino',
                port_id_estado = '$port_id_estado'
                WHERE port_id = '$port_id'";
      } else {
        echo '<script>
                alert("ERROR AL SUBIR LA IMAGEN");
                window.history.go(-1);
              </script>';
        exit;
      }
    } else {
      // Si no se sube imagen, mantener la actual
      $sql = "UPDATE portafolio SET
              port_titulo = '$port_titulo',
              port_descripcion = '$port_descripcion',
              port_link = '$port_link',
              port_id_tipo = '$port_id_tipo',
              port_id_estado = '$port_id_estado'
              WHERE port_id = '$port_id'";
    }

    // Ejecutar la consulta
    if (mysqli_query($conectar, $sql)) {
      if (isset($_POST['portec_id_tecnologias'])) {
        $tecnologias = $_POST['portec_id_tecnologias'];

        // Eliminar tecnologías anteriores
        $sql_delete = "DELETE FROM portafolio_tecnologias WHERE portec_id_portafolio = '$port_id'";
        mysqli_query($conectar, $sql_delete);

        // Insertar nuevas tecnologías
        foreach ($tecnologias as $tec_id) {
          $sql_insert = "INSERT INTO portafolio_tecnologias (portec_id_portafolio, portec_id_tecnologia) VALUES ('$port_id', '$tec_id')";
          mysqli_query($conectar, $sql_insert);
        }
      }

      echo '<script>
              alert("SE ACTUALIZÓ CORRECTAMENTE");
              location.href="index.php";
            </script>';
    } else {
      echo '<script>
              alert("ERROR AL ACTUALIZAR LOS DATOS");
              window.history.go(-1);
            </script>';
    }
  }
?>