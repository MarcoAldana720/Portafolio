<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marco Aldana | Frontend Designer</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <!-- STYLE GLOBAL, TABLET AND MOVIL -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/movil.css">
  <!-- SCRIPT OF FONTAWESOME -->
  <script src="https://kit.fontawesome.com/228ea9976a.js" crossorigin="anonymous"></script>
  <!-- SCRIPT OF JQUERY -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- SCRIPT OF CAPTCHA -->
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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

  <!-- SECTION FOR THE LOGIN -->
  <section class="content_present">
    <div class="login_container">
      <div class="login_box">
        <h2 class="login_title">Iniciar Sesión</h2>

        <div id="form-message" class="form-message"></div>

        <form action="authenticate.php" method="POST" id="form-validation">

          <div class="input_group">
            <label for="us_usuario">Usuario</label>
            <input type="text" id="us_usuario" name="us_usuario" autocomplete="off">
            <small class="error-message">Campo obligatorio.</small>
          </div>

          <div class="input_group">
            <label for="us_contrasena">Contraseña</label>
            <input type="password" id="us_contrasena" name="us_contrasena">
            <small class="error-message">Campo obligatorio.</small>
          </div>

          <div class="recaptcha-container">
            <div class="g-recaptcha" data-sitekey="6LcYbDcrAAAAAHkGqnjUA0aS2a5atH-mftL4Ca8Y"></div>
          </div>

          <button class="btn_login" type="submit">
            <span></span><span></span><span></span><span></span>
            <i class="fa-solid fa-lock"></i>Ingresar
          </button>
        </form>
      </div>
    </div>
  </section>

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

    // VALIDATION FOR THE FORM
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('form-validation');
      const fields = form.querySelectorAll('input');
      const messageContainer = document.getElementById('form-message');

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        let isValid = true;
        let emptyFields = false;

        messageContainer.textContent = '';
        messageContainer.className = 'form-message';
        messageContainer.style.display = 'none';

        // Validar campos vacíos
        fields.forEach(field => {
          const error = field.nextElementSibling;
          error.style.display = 'none';
          field.classList.remove('error');

          if (field.value.trim() === '') {
            isValid = false;
            emptyFields = true;
            field.classList.add('error');
            error.style.display = 'block';
          }
        });

        // Mostrar mensaje general si hay campos vacíos
        if (emptyFields) {
          messageContainer.textContent = 'Todos los campos son obligatorios.';
          messageContainer.classList.add('error');
          messageContainer.style.display = 'block';
          return; // Detiene aquí si hay campos vacíos
        }

        // Validar reCAPTCHA
        const captchaResponse = grecaptcha.getResponse();
        if (!captchaResponse) {
          messageContainer.textContent = 'Verifica el reCAPTCHA para continuar.';
          messageContainer.classList.add('error');
          messageContainer.style.display = 'block';
          return;
        }

        // Preparar datos y enviar
        const formData = new FormData(form);
        formData.append('g-recaptcha-response', captchaResponse);

        fetch('authenticate.php', {
          method: 'POST',
          body: formData
        })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            window.location.href = '/portafolio/admins';
          } else {
            messageContainer.textContent = data.message;
            messageContainer.classList.add('error');
            messageContainer.style.display = 'block';
            grecaptcha.reset();
          }
        })
        .catch(() => {
          messageContainer.textContent = 'Error al procesar el formulario.';
          messageContainer.classList.add('error');
          messageContainer.style.display = 'block';
          grecaptcha.reset();
        });
      });

      fields.forEach(field => {
        field.addEventListener('input', () => {
          field.classList.remove('error');
          field.nextElementSibling.style.display = 'none';
        });
      });
    });
  </script>
</body>
</html>