<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Marco Aldana | Web Designer</title>
  <meta name="description" content="Soluciones creativas en diseño gráfico, marketing digital, producción multimedia y desarrollo web en Mérida, Yucatán. Creamos marcas, sitios web y aplicaciones que impulsan tu presencia digital.">
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
  <!-- SECTION FOR THE PRESENT -->
  <section class="hero_slider">
    <!-- SECTION FOR THE HEADER -->
    <header class="menu">
      <figure class="logo">
        <img src="img/logo_2_white.png" alt="Logo">
      </figure>

      <div class="menu_toggle" id="menu_toggle">
        <i id="menu_icon" class="fas fa-bars"></i>
      </div>

      <nav class="nav_menu" id="nav_menu">
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="#opcion1">Sobre mi</a></li>
          <li><a href="#opcion3">Servicios</a></li>
          <li><a href="#opcion2">Habilidades</a></li>
          <li><a href="#opcion4">Contacto</a></li>
          <li><a href="portafolio.php">Portafolio</a></li>
        </ul>
      </nav>
    </header>
    
    <!-- Slides -->
    <div class="slides">
      <!-- Slide 1 -->
      <div class="slide slide1 active">
        <div class="slide_content">
          <h2 style="color: #FFB901;">DISEÑO GRÁFICO</h2>
          <p>Creamos identidad visual única: logotipos, branding y piezas gráficas que refuerzan la personalidad de tu marca.</p>
          <a href="#opcion4" class="btn_hover">
            <span></span><span></span><span></span><span></span>
            <i class="fa-solid fa-envelope"></i> Contacto
          </a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="slide slide2">
        <div class="slide_content">
          <h2 style="color: #FFB901;">DISEÑO MARKETING</h2>
          <p>Desarrollamos estrategias visuales y digitales para potenciar tu marca, conectar con tu público y aumentar tu presencia online.</p>
          <a href="#opcion4" class="btn_hover">
            <span></span><span></span><span></span><span></span>
            <i class="fa-solid fa-envelope"></i> Contacto
          </a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="slide slide3">
        <div class="slide_content">
          <h2 style="color: #FFB901;">PRODUCCIÓN MULTIMEDIA</h2>
          <p>Generamos contenido audiovisual impactante: animaciones, videos y experiencias interactivas que comunican de forma creativa.</p>
          <a href="#opcion4" class="btn_hover">
            <span></span><span></span><span></span><span></span>
            <i class="fa-solid fa-envelope"></i> Contacto
          </a>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="slide slide4">
        <div class="slide_content">
          <h2 style="color: #FFB901;">DESARROLLO WEB Y APLICACIONES</h2>
          <p>Diseñamos y programamos sitios web, aplicaciones móviles y software a la medida, garantizando rendimiento, seguridad y escalabilidad.</p>
          <a href="#opcion4" class="btn_hover">
            <span></span><span></span><span></span><span></span>
            <i class="fa-solid fa-envelope"></i> Contacto
          </a>
        </div>
      </div>
    </div>

    <!-- Controles -->
    <div class="slider_dots">
      <button class="dot active" data-slide="0"></button>
      <button class="dot" data-slide="1"></button>
      <button class="dot" data-slide="2"></button>
      <button class="dot" data-slide="3"></button>
    </div>
  </section>

  <!-- SECTION FOR THE PROFILE -->
  <section class="content_profile" id="opcion1">
    <div class="profile_container">
      <!-- <figure class="profile_image">
        <img src="img/Modificaciones Desde App.jpg" alt="Foto de perfil" draggable="false" oncontextmenu="return false;">
      </figure> -->
      <div class="profile_info">
        <h2>Sobre mi</h2>
        <hr><br>
        <p>Soy Ingeniero en Sistemas Computacionales, apasionado por la tecnología e innovación, con un fuerte compromiso hacia la excelencia y la satisfacción del cliente. Me caracterizo por ser una persona dedicada, adaptable y con gran capacidad para enfrentar nuevos retos, siempre buscando aportar soluciones eficientes y creativas.</p><br>
        <p>Mi objetivo es integrarme en una empresa con visión de futuro, que me brinde estabilidad laboral y al mismo tiempo me permita seguir creciendo profesionalmente, aplicando y ampliando mis conocimientos en diseño, desarrollo y gestión de proyectos tecnológicos.</p><br>
        <p>Cuento con experiencia en el área de diseño gráfico, marketing digital, multimedia, desarrollo frontend y backend, así como en la creación de aplicaciones y software a la medida, lo que me permite ofrecer soluciones digitales integrales adaptadas a cada necesidad.</p><br>
        <p> Les dejo mi link para descargar mi curriculum.</p><br>
        <a href="docs/CV-Marco-A-Aldana-Ley.pdf" target="_blank" class="btn_cv">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <i class="fa-solid fa-download"></i>
          Descargar CV
        </a>
      </div>
    </div>
  </section>

  <!-- SECTION FOR THE KNOWLEDGE -->
  <section class="content_knowledge" id="opcion3">
    <h2>Servicios</h2>
    <hr><br>
    <p class="services_description">Ofresco soluciones digitales integrales, desde la creación de tu logo hasta el desarrollo de aplicaciones y sistemas completos.</p>

    <div class="knowledge">
      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-palette"></i>
          <p>Diseño Gráfico</p>
        </div>
        <div>
          <p>Creamos identidades visuales profesionales que reflejan la esencia de tu marca, generando confianza y diferenciación en el mercado.</p>
        </div>
      </article>

      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-bullhorn"></i>
          <p>Diseño Marketing</p>
        </div>
        <div>
          <p>Desarrollamos estrategias visuales que refuerzan tu marca, creando una conexión efectiva con tu audiencia y mejorando su reconocimiento digital.</p>
        </div>
      </article>

      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-video"></i>
          <p>Producción Multimedia</p>
        </div>
        <div>
          <p>Creamos videos, reels y animaciones digitales profesionales y atractivas que transmiten mensajes de forma dinámica y memorable.</p>
        </div>
      </article>

      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-laptop-code"></i>
          <p>Desarrollador Front-end</p>
        </div>
        <div>
          <p>Creamos interfaces modernas y responsivas, optimizadas para brindar experiencias rápidas, fluidas y seguras en cualquier dispositivo digital actual.</p>
        </div>
      </article>

      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-server"></i>
          <p>Desarrollador Back-end</p>
        </div>
        <div>
          <p>Diseñamos sistemas robustos y escalables, asegurando el correcto funcionamiento interno de tu sitio web o aplicación en producción.</p>
        </div>
      </article>

      <article>
        <div class="article_icon_title">
          <i class="fa-solid fa-mobile-screen-button"></i>
          <p>Aplicaciones y Software</p>
        </div>
        <div>
          <p>Desarrollamos aplicaciones móviles y de escritorio personalizadas y escalables, que optimizan procesos y mejoran experiencias digitales.</p>
        </div>
      </article>
    </div>
  </section>

  <!-- SECTION FOR THE PORTAFOLIO -->
  <section class="content_portafolio">
    <div class="portafolio_info">
      <p>¡Haz click aqui para ver mi portafolio!</p>
      <a href="portafolio.php" class="btn_portafolio">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <i class="fa-solid fa-folder"></i>
        Ver portafolio
      </a>
    </div>
  </section>

  <!-- SECTION FOR THE SKILLS -->
  <section class="content_skills" id="opcion2">
    <h2>Habilidades</h2>
    <hr><br>
    <p class="services_description">Poseo habilidades en diseño de interfaces, desarrollo de aplicaciones móviles y sistemas web, creando experiencias digitales atractivas y funcionales.</p>

    <div class="skills_center">
      <div class="skills_left">
        <h3>Habilidades De Diseño</h3>
        <article>
          <div class="skill_info">
            <strong>Adobe Illustrator</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="80"></div>
            </div>
          </div>
          <span class="percentage">80%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>Adobe XD</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="70"></div>
            </div>
          </div>
          <span class="percentage">70%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>Adobe Photoshop</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="80"></div>
            </div>
          </div>
          <span class="percentage">80%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>Figma</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="70"></div>
            </div>
          </div>
          <span class="percentage">70%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>Canvas</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="85"></div>
            </div>
          </div>
          <span class="percentage">85%</span>
        </article>
      </div>
      <div class="skills_right">
        <h3>Habilidades De Programación</h3>
        <article>
          <div class="skill_info">
            <strong>HTML</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="90"></div>
            </div>
          </div>
          <span class="percentage">90%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>CSS</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="80"></div>
            </div>
          </div>
          <span class="percentage">80%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>JavaScript</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="85"></div>
            </div>
          </div>
          <span class="percentage">85%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>PHP</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="75"></div>
            </div>
          </div>
          <span class="percentage">75%</span>
        </article>
        <article>
          <div class="skill_info">
            <strong>Flutter y Android</strong>
            <div class="progress-container">
              <div class="progress-bar" data-value="50"></div>
            </div>
          </div>
          <span class="percentage">50%</span>
        </article>
      </div>
    </div>
  </section>

  <!-- SECTION FOR THE CONTACT -->
  <section class="content_contact" id="opcion4">
    <div class="contact_left">
      <div id="form-message" class="form-message"></div>

      <form action="submit.php" id="form-validation" method="POST" novalidate>
        <label for="name">Nombre *</label>
        <input type="text" id="name" name="name">
        <small class="error-message">Dato requerido.</small>

        <label for="email">Correo electrónico *</label>
        <input type="email" id="email" name="email">
        <small class="error-message">Dato requerido.</small>

        <label for="subject">Asunto *</label>
        <select name="subject" id="subject">
          <option value="" disabled selected>Seleccione una opción</option>
          <option value="Diseño de logo o página web">Diseño de logo o página web</option>
          <option value="Programación de página web">Programación de página web</option>
          <option value="Otro">Otro</option>
        </select>
        <small class="error-message">Dato requerido.</small>

        <label for="message">Mensaje *</label>
        <textarea name="message" id="message"></textarea>
        <small class="error-message">Dato requerido.</small>

        <!-- CONTENT FOR THE RECAPTCHA -->
        <div class="g-recaptcha" data-sitekey="6LcYbDcrAAAAAHkGqnjUA0aS2a5atH-mftL4Ca8Y"></div>

        <button type="submit">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <i class="fa-solid fa-paper-plane"></i>
          Enviar
        </button>
      </form>
    </div>

    <div class="contact_right">
      <h2>CONTACTO</h2>
      <hr><br>
      <p>¿Tienes alguna consulta, una oportunidad laboral o una propuesta de colaboración? Completa el formulario y envíame tu mensaje.</p>
    </div>
  </section>

  <?php
    include 'footer.php';
  ?>

  <!-- SCRIPT -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      // MENÚ TOGGLE
      const menuToggle = document.getElementById("menu_toggle");
      const menuIcon = document.getElementById("menu_icon");
      const navMenu = document.getElementById("nav_menu");

      if (menuToggle && navMenu && menuIcon) {
        menuToggle.addEventListener("click", () => {
          navMenu.classList.toggle("active");
          document.body.style.overflow = navMenu.classList.contains("active") ? "hidden" : "";

          menuIcon.classList.toggle("fa-bars");
          menuIcon.classList.toggle("fa-times");
        });
      }

      // CERRAR MENU AL HACER CLICK EN LINK
      document.querySelectorAll(".nav_menu ul li a").forEach(link => {
        link.addEventListener("click", () => {
          if (navMenu) {
            navMenu.classList.remove("active");
            document.body.style.overflow = "";
          }
        });
      });

      // CAMBIO DE COLOR DEL MENÚ AL SCROLL
      window.addEventListener("scroll", function () {
        const menu = document.querySelector(".menu");
        const navMenu = document.querySelector(".nav_menu");

        if (window.scrollY > 50) { // Si baja más de 50px
          menu.classList.add("scrolled");
          navMenu.classList.add("scrolled-menu");
        } else {
          menu.classList.remove("scrolled");
          navMenu.classList.remove("scrolled-menu");
        }
      });

      // BOTÓN BACK TO TOP
      const backToTop = document.getElementById("back_to_top");
      const primeraSeccion = document.querySelector(".hero_slider");

      if (backToTop && primeraSeccion) {
        window.addEventListener("scroll", () => {
          const sectionBottom = primeraSeccion.getBoundingClientRect().bottom;
          if (sectionBottom < window.innerHeight / 2) {
            backToTop.classList.add("show");
            backToTop.classList.remove("hide");
          } else {
            backToTop.classList.add("hide");
            setTimeout(() => backToTop.classList.remove("show"), 300);
          }
        });

        backToTop.addEventListener("click", () => {
          window.scrollTo({ top: 0, behavior: "smooth" });
        });
      }

      // SLIDER DOTS
      const slides = document.querySelectorAll(".slide");
      const dots = document.querySelectorAll(".dot");
      let current = 0;

      function showSlide(index) {
        slides.forEach(s => s.classList.remove("active"));
        dots.forEach(d => d.classList.remove("active"));
        slides[index].classList.add("active");
        dots[index].classList.add("active");
        current = index;
      }

      dots.forEach((dot, index) => {
        dot.addEventListener("click", () => showSlide(index));
      });

      // SLIDER AUTOMÁTICO
      setInterval(() => {
        let nextIndex = current + 1 >= slides.length ? 0 : current + 1;
        showSlide(nextIndex);
      }, 5000); // Cambia cada 5 segundos

      // FUNCION PARA EL PROCENTAJE
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          const bars = entry.target.querySelectorAll('.progress-bar');

          if (entry.isIntersecting) {
            bars.forEach(bar => {
              const value = parseInt(bar.getAttribute('data-value'));
              let count = 0;
              const percentText = bar.closest('article').querySelector('.percentage');
              
              const animationInterval = 1500;
              const stepTime = animationInterval / value;

              const interval = setInterval(() => {
                if (count <= value) {
                  bar.style.width = count + '%';
                  if (percentText) percentText.textContent = count + '%';
                  count++;
                } else {
                  clearInterval(interval);
                }
              }, stepTime);
            });
          } else {
            bars.forEach(bar => {
              const percentText = bar.closest('article').querySelector('.percentage');
              
              // Reset values
              bar.style.width = '0%';
              if (percentText) percentText.textContent = '0%';
            });
          }
        });
      }, { threshold: 0.1 });

      const section = document.getElementById("opcion2");
      if (section) {
        observer.observe(section);
      }

      // FORMULARIO
      const form = document.getElementById("form-validation");
      const messageContainer = document.getElementById("form-message");

      if (form) {
        const fields = form.querySelectorAll("input, textarea, select");

        form.addEventListener("submit", e => {
          e.preventDefault();
          let isValid = true;
          messageContainer.style.display = "none";
          messageContainer.className = "form-message";
          messageContainer.textContent = "";

          fields.forEach(field => {
            const value = field.value.trim();
            const errorMessage = field.nextElementSibling;
            field.classList.remove("error", "warning");
            if (errorMessage) errorMessage.style.display = "none";

            if (!value) {
              field.classList.add("error");
              if (errorMessage) {
                errorMessage.textContent = "Campo obligatorio.";
                errorMessage.style.display = "block";
              }
              messageContainer.innerHTML = "Todos los campos son obligatorios.";
              messageContainer.classList.add("error");
              messageContainer.style.display = "block";
              isValid = false;
            }

            if (field.type === "email" && value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
              field.classList.add("warning");
              if (errorMessage) {
                errorMessage.textContent = "Formato incorrecto.";
                errorMessage.style.display = "block";
              }
              messageContainer.innerHTML =
                "El correo electrónico no tiene el formato correcto.<br>Ejemplo: xxxxx@xxxxx.com";
              messageContainer.classList.add("warning");
              messageContainer.style.display = "block";
              isValid = false;
            }
          });

          if (isValid && typeof grecaptcha !== "undefined") {
            const captchaResponse = grecaptcha.getResponse();
            if (!captchaResponse) {
              messageContainer.textContent = "Verifica el reCAPTCHA para continuar.";
              messageContainer.classList.add("error");
              messageContainer.style.display = "block";
              return;
            }
          }

          if (isValid) {
            const formData = new FormData(form);
            fetch("submit.php", { method: "POST", body: formData })
              .then(res => res.json())
              .then(data => {
                messageContainer.textContent = data.success
                  ? "Mensaje enviado con éxito."
                  : "Error: " + data.message;
                messageContainer.className = "form-message";
                messageContainer.classList.add(data.success ? "success" : "error");
                messageContainer.style.display = "block";
                if (data.success) form.reset();
                if (typeof grecaptcha !== "undefined") grecaptcha.reset();
              })
              .catch(err => {
                console.error(err);
                messageContainer.textContent = "Ocurrió un error. Intente nuevamente.";
                messageContainer.className = "error";
                messageContainer.style.display = "block";
              });
          }
        });

        // Oculta errores al escribir
        fields.forEach(field => {
          const hideError = () => {
            if (field.value.trim() !== "") {
              field.classList.remove("error", "warning");
              const errorMessage = field.nextElementSibling;
              if (errorMessage) errorMessage.style.display = "none";
            }
          };
          field.addEventListener("input", hideError);
          field.addEventListener("change", hideError);
        });
      }
    });
  </script>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "url": "https://marcoaldana.alwaysdata.net",
    "logo": "https://marcoaldana.alwaysdata.net/favicon.ico"
  }
  </script>
</body>
</html>