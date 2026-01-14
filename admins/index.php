<?php
  include "security.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marco Aldana | Frontend Designer</title>
  <!-- STYLE GLOBAL, TABLET AND MOVIL -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/movil.css">
  <!-- SCRIPT OF FONTAWESOME -->
  <script src="https://kit.fontawesome.com/228ea9976a.js" crossorigin="anonymous"></script>
  <!-- SCRIPT OF JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <!-- SECTION FOR THE HEADER -->
  <header class="menu_2">
    <figure class="logo_2">
      <img src="../img/logo.png" alt="Logo">
    </figure>

    <div class="menu_toggle_2" id="menu_toggle_2">
      <i class="fa-solid fa-bars"></i>
    </div>

    <nav class="nav_menu_2" id="nav_menu_2">
      <ul>
        <li><a href="index.php">Portafolio</a></li>
        <!-- <li><a href="gallery.php">Galeria</a></li> -->
      </ul>
    </nav>
  </header>

  <!-- SECTION FOR THE CLOSE SESSION -->
  <div class="close_session" id="close_session">
    <a href="logout.php">Cerrar sesion</a>
  </div>

  <!-- SECTION FOR THE CRUD -->
  <section class="content_crud">
    <h1>Lista de portafolio</h1>
    <span class="description">La sección de usuarios ofrece una visión completa de todos los miembros registrados en la plataforma.</span><br /><br />

    <div class="content_controls">
      <div class="content_add">
        <a href="form_portafolio.php" class="content_btn">
          <span>Agregar</span>
        </a>
      </div>

      <div class="content_search">
        <input type="text" id="searchInput" placeholder="Buscar...">
        <div class="content_icon">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
      </div>
    </div><br>

    <!-- Mensaje de "No se encontraron resultados" -->
    <p id="noResultsMessage" style="display: none; text-align: center;">No se encontraron resultados.</p>

    <div class="content_table">
      <?php
        require "../conexion.php";

        $todos_datos = "SELECT p.port_id, p.port_titulo, p.port_descripcion, t.tp_descripcion
                        FROM portafolio p
                        JOIN tipo_portafolio t ON p.port_id_tipo = t.tp_id
                        ORDER BY p.port_id ASC";
        $result = mysqli_query($conectar, $todos_datos);

        if (mysqli_num_rows($result) > 0) {
      ?>

      <table id="portfolioTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Tipo de portafolio</th>
            <th>Accion</th>
          </tr>
        </thead>

        <tbody>
          <?php
            while($fila = mysqli_fetch_assoc($result)) {
          ?>

          <tr>
            <td><?php echo $fila["port_id"];?></td>
            <td><?php echo $fila["port_titulo"];?></td>
            <td><?php echo $fila["port_descripcion"];?></td>
            <td><?php echo $fila["tp_descripcion"];?></td>
            <td>
              <a href="update_portafolio.php?id=<?php echo $fila['port_id'] ?>"><i class="fa-solid fa-pen-to-square icon_edit"></i></a>
              <i class="fa-solid fa-trash icon_delete" onClick="validar('delete_portafolio.php?id=<?php echo $fila["port_id"];?>');"></i>
            </td>
          </tr>

          <?php
            }
          ?>
        </tbody>
      </table>

      <?php
        } else {
          echo "<div class='no-data-message'><p>No hay registros en la tabla de portafolio.</p></div>";
        }

        mysqli_free_result($result);
      ?>
    </div><br />
  </section>

  <!-- SECTION FOR THE FOOTER -->
  <section class="content_footer">
    <figure>
      <img src="../img/logo_final.png" alt="Logo Final">
    </figure>
    <div class="content_networck">
      <div class="networck_info">
        <p>Redes sociales</p>
        <div class="networck">
          <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
          <a href="#"><i class="fa-brands fa-instagram"></i></a>
          <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
          <a href="#"><i class="fa-brands fa-behance"></i></a>
        </div>
      </div>
    </div>
  </section>

  <!-- SECTION FOR THE ARROW -->
  <div class="back_to_top" id="back_to_top">
    <a id="back_to_top"><i class="fa-solid fa-chevron-up"></i></a>
  </div>

  <!-- SCRIPT FOR THE FUNCTIONS-->
  <script>
    document.getElementById("menu_toggle_2").addEventListener("click", function () {
      const menu = document.getElementById("nav_menu_2");
      menu.classList.toggle("active");

      if (menu.classList.contains("active")) {
        document.body.style.overflow = "hidden"; // Bloquear scroll
      } else {
        document.body.style.overflow = ""; // Restaurar scroll
      }
    });

    // CERRAR MENÚ AL HACER CLIC EN UNA OPCIÓN
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

    // SCRIPT FOR THE VALIDATION
    function validar(url) {
      var eliminar = confirm("REALMENTE DESEA ELIMINAR EL REGISTRO");

      if(eliminar == true) {
        window.location=url;
      }
    }

    // SCRIPT FOR THE SEARCH
    document.getElementById("searchInput").addEventListener("input", function () {
      let filter = this.value.toLowerCase();
      let rows = document.querySelectorAll(".content_table tbody tr");
      let found = false; // Variable para verificar si se encontró coincidencia
      let table = document.getElementById("portfolioTable");
      let message = document.getElementById("noResultsMessage");

      rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        if (text.includes(filter)) {
          row.style.display = ""; // Muestra la fila
          found = true; // Se encontró al menos una coincidencia
        } else {
          row.style.display = "none"; // Oculta la fila
        }
      });

      // Mostrar mensaje si no hay coincidencias y ocultar la tabla
      if (!found) {
        message.style.display = "block"; // Mostrar mensaje de "No se encontraron resultados"
        table.style.display = "none"; // Ocultar la tabla
      } else {
        message.style.display = "none"; // Ocultar mensaje
        table.style.display = "table"; // Mostrar la tabla si hay resultados
      }
    });
  </script>
</body>
</html>