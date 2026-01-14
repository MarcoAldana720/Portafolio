<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marco Aldana | Frontend Designer</title>
  <link rel="shortcut icon" href="img/icono_2_blue.png" type="image/x-icon">
  <!-- STYLE GLOBAL, TABLET AND MOVIL -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/movil.css">
  <!-- STYLE FANCYBOX -->
  <link rel="stylesheet" href="css/fancybox.css">
  <!-- SCRIPT OF FONTAWESOME -->
  <script src="https://kit.fontawesome.com/228ea9976a.js" crossorigin="anonymous"></script>
  <!-- SCRIPT OF JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- SCRIPT OF FANCYBOX -->
  <script src="js/fancybox.js"></script>
</head>
<body>
  <!-- SECTION FOR THE HEADER -->
  <header class="menu_2">
    <figure class="logo_2">
      <img src="img/logo_2_white.png" alt="Logo">
    </figure>

    <div class="menu_toggle_2" id="menu_toggle_2">
      <i id="menu_icon_2" class="fas fa-bars"></i>
    </div>

    <nav class="nav_menu_2" id="nav_menu_2">
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="index.php#opcion1">Sobre mi</a></li>
        <li><a href="index.php#opcion2">Habilidades</a></li>
        <li><a href="index.php#opcion3">Servicios</a></li>
        <li><a href="index.php#opcion4">Contacto</a></li>
        <li><a href="portafolio.php">Portafolio</a></li>
      </ul>
    </nav>
  </header>

  <!-- SECTION FOR THE TITLE OF PORTALIO -->
  <section class="title_portafolio">
    <h1>portafolio de proyectos</h1>
  </section>

  <!-- SECTION FOR THE TABS -->
  <?php
    require "conexion.php";

    $sql = "
      SELECT
        p.port_id,
        p.port_titulo,
        p.port_descripcion,
        p.port_foto,
        p.port_link,
        t.tp_id,
        t.tp_descripcion,
        GROUP_CONCAT(tec.tec_icon) AS tecnologias_iconos
      FROM portafolio p
      JOIN tipo_portafolio t ON p.port_id_tipo = t.tp_id
      LEFT JOIN portafolio_tecnologias pt ON p.port_id = pt.portec_id_portafolio
      LEFT JOIN tecnologias tec ON pt.portec_id_tecnologia = tec.tec_id
      WHERE p.port_id_estado = 1
      GROUP BY p.port_id
    ";

    $result = mysqli_query($conectar, $sql);

    // Crear un array para cada categoría
    $imagenes = [
      'Todos' => [],
      'Logos' => [],
      'Paginas web' => []
    ];

    while ($fila = $result->fetch_assoc()) {
      $imagenes['Todos'][] = $fila;
      if ($fila['tp_descripcion'] == 'Logos') {
          $imagenes['Logos'][] = $fila;
      }

      if ($fila['tp_descripcion'] == 'Paginas web') {
          $imagenes['Paginas web'][] = $fila;
      }
    }

    $conectar->close();
  ?>

  <section class="wrapper">
    <div class="box">
      <!-- Sección Todos -->
      <input type="radio" name="box" id="box1" checked>
      <label for="box1">Todos</label>
      <div class="content">
        <?php if (empty($imagenes['Todos'])) : ?>
          <p class="no-data">No hay proyectos disponibles en la categoría.</p>
        <?php else : ?>
          <?php foreach ($imagenes['Todos'] as $img) : ?>
            <?php if ($img['tp_descripcion'] == 'Paginas web') : ?>
              <!-- Diseño de Páginas Web -->
              <figure>
                <a href="<?= "admins/" . $img['port_foto'] ?>" data-fancybox="gallery" data-caption="<?= $img['port_titulo'] ?>" class="fancybox-link">
                  <img src="<?= "admins/" . $img['port_foto'] ?>" alt="<?= $img['port_titulo'] ?>">
                  <div class="wrapper_description">
                    <h3><?= $img['port_titulo'] ?></h3>
                    <p><?= $img['port_descripcion'] ?></p>
                    <!-- CONTENT FOR THE TECNOLOGIAS -->
                    <div class="wrapper_tecnologias">
                      <?php
                        if (!empty($img['tecnologias_iconos'])) {
                          $iconos = explode(',', $img['tecnologias_iconos']);
                          foreach ($iconos as $icono) {
                            echo "<i class='$icono'></i> ";
                          }
                        }
                      ?>
                    </div>
                  </div>
                </a>

                <div class="wrapper_more">
                  <a href="<?= $img['port_link'] ?>" target="_blank">Ver más</a>
                </div>
              </figure>

            <?php elseif ($img['tp_descripcion'] == 'Logos') : ?>
              <!-- Diseño de Logos -->
              <a href="<?= "admins/" . $img['port_foto'] ?>" data-fancybox="gallery" data-caption="<?= $img['port_titulo'] ?>">
                <figure>
                  <img src="<?= "admins/" . $img['port_foto'] ?>" alt="<?= $img['port_titulo'] ?>">
                  <div class="wrapper_info">
                    <p><?= $img['port_titulo'] ?></p>
                  </div>
                  <div class="wrapper_description">
                    <h3><?= $img['port_titulo'] ?></h3>
                    <p><?= $img['port_descripcion'] ?></p>
                  </div>
                </figure>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Sección Logos -->
      <input type="radio" name="box" id="box2">
      <label for="box2">Logos</label>
      <div class="content">
        <?php if (empty($imagenes['Logos'])) : ?>
          <p class="no-data">No hay proyectos disponibles en la categoría.</p>
        <?php else : ?>
          <?php foreach ($imagenes['Logos'] as $img) : ?>
            <a href="<?= "admins/" . $img['port_foto'] ?>" data-fancybox="gallery" data-caption="<?= $img['port_titulo'] ?>">
              <figure>
                <img src="<?= "admins/" . $img['port_foto'] ?>" alt="<?= $img['port_titulo'] ?>">
                <div class="wrapper_info">
                  <p><?= $img['port_titulo'] ?></p>
                </div>
                <div class="wrapper_description">
                  <h3><?= $img['port_titulo'] ?></h3>
                  <p><?= $img['port_resumen'] ?></p>
                </div>
              </figure>
            </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>

      <!-- Sección Páginas web -->
      <input type="radio" name="box" id="box3">
      <label for="box3">Páginas web</label>
      <div class="content">
        <?php if (empty($imagenes['Paginas web'])) : ?>
          <p class="no-data">No hay proyectos disponibles en la categoría.</p>
        <?php else : ?>
          <?php foreach ($imagenes['Paginas web'] as $img) : ?>
            <figure>
              <a href="<?= "admins/" . $img['port_foto'] ?>" data-fancybox="gallery" data-caption="<?= $img['port_titulo'] ?>" class="fancybox-link">
                <img src="<?= "admins/" . $img['port_foto'] ?>" alt="<?= $img['port_titulo'] ?>">
                <div class="wrapper_description">
                  <h3><?= $img['port_titulo'] ?></h3>
                  <p><?= $img['port_descripcion'] ?></p>
                  <!-- CONTENT FOR THE TECNOLOGIAS -->
                  <div class="wrapper_tecnologias">
                    <?php
                      if (!empty($img['tecnologias_iconos'])) {
                        $iconos = explode(',', $img['tecnologias_iconos']);
                        foreach ($iconos as $icono) {
                          echo "<i class='$icono'></i> ";
                        }
                      }
                    ?>
                  </div>
                </div>
              </a>

              <div class="wrapper_more">
                <a href="<?= $img['port_link'] ?>" target="_blank">Ver más</a>
              </div>
            </figure>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>

  <!-- SCRIPT -->
  <script>
    // SCRIPT PARA EL MENÚ
    document.getElementById("menu_toggle_2").addEventListener("click", function () {
      const menu = document.getElementById("nav_menu_2");
      const icon = document.getElementById("menu_icon_2");

      menu.classList.toggle("active");

      if (menu.classList.contains("active")) {
        document.body.style.overflow = "hidden";
        icon.classList.remove("fa-bars");
        icon.classList.add("fa-times");
      } else {
        document.body.style.overflow = "";
        icon.classList.remove("fa-times");
        icon.classList.add("fa-bars");
      }
    });

    // CERRAR MENÚ AL HACER CLICK EN UNA OPCIÓN
    document.querySelectorAll(".nav_menu_2 ul li a").forEach((link) => {
      link.addEventListener("click", function () {
        const menu = document.getElementById("nav_menu_2");
        menu.classList.remove("active");
        document.body.style.overflow = ""; // Restaurar scroll
      });
    });

    // SCRIPT TO HIDE SCROLL
    const icono = document.getElementById("back_to_top");
    const primeraSeccion = document.querySelector(".title_portafolio");

    window.addEventListener("scroll", function() {
      // Obtener la posición de la primera sección
      const sectionBottom = primeraSeccion.getBoundingClientRect().bottom;

      if (sectionBottom < window.innerHeight / 2) {
        // Si la primera sección ya no está visible, mostrar el icono
        icono.classList.add("show");
        icono.classList.remove("hide");
      } else {
        // Ocultar el icono si el usuario vuelve a la primera sección
        icono.classList.add("hide");
        setTimeout(() => {
          icono.classList.remove("show");
        }, 300);
      }
    });

    // SCRIPT FOT THE ARROW
    $('#back_to_top').click(function () {
      $('body,html').animate(
        {
          scrollTop: 0
        }, 500
      );
      return false;
    });

    // SCRIOT FOR THE FANCYBOX.JS
    Fancybox.bind('[data-fancybox="gallery"]', {
      Hash: false,
      Thumbs: false,

      compact: false,

      contentClick: "toggleCover",
      wheel : "slide",

      Toolbar: {
        display: {
          left: [],
          middle: [],
          right: ["close"],
        },
      },

      Images: {
        Panzoom: {
          panMode: "mousemove",
          mouseMoveFactor: 1.1,
          mouseMoveFriction: 0.12
        },
      },
    });
  </script>
</body>
</html>