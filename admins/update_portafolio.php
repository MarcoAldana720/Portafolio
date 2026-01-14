<?php
  require "../conexion.php";

  $id = $_GET['id'];

  // Consulta del portafolio
  $sql = "SELECT * FROM portafolio WHERE port_id = '$id'";
  $result = mysqli_query($conectar, $sql);
  $row = mysqli_fetch_array($result);

  // Consulta de tecnologías asociadas
  $sql_tec = "SELECT portec_id_tecnologia FROM portafolio_tecnologias WHERE portec_id_portafolio = '$id'";
  $result_tec = mysqli_query($conectar, $sql_tec);

  // Guardamos las tecnologías en un array
  $tecnologias_seleccionadas = [];
  while ($tec = mysqli_fetch_assoc($result_tec)) {
    $tecnologias_seleccionadas[] = $tec['portec_id_tecnologia'];
  }
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
        <li><a href="gallery.php">Galeria</a></li>
      </ul>
    </nav>
  </header>

  <!-- SECTION FOR THE CRUD -->
  <section class="content_form">
    <div class="content_left_2">
      <h2>Editar portafolio</h2><br>
      <form action="edit_portafolio.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="port_id" value="<?php echo $row['port_id']; ?>">

        <label for="port_titulo">Titulo del proyecto:</label><br>
        <input type="text" id="port_titulo" name="port_titulo" value="<?php echo $row['port_titulo']; ?>"><br>

        <label for="port_descripcion">Descripción:</label><br>
        <textarea type="text" name="port_descripcion" id="port_descripcion"><?php echo $row['port_descripcion']; ?></textarea><br>

        <label for="portec_id_tecnologias">Tecnologías:</label><br>
        <select name="portec_id_tecnologias[]" id="portec_id_tecnologias" multiple multiselect-search="true" multiselect-select-all="true" multiselect-max-items="3" class="select_tag">
        <?php
          $sql = "SELECT tec_id, tec_descripcion FROM tecnologias";
          $result = mysqli_query($conectar, $sql);
          while ($tec = mysqli_fetch_assoc($result)) {
            $selected = in_array($tec['tec_id'], $tecnologias_seleccionadas) ? "selected" : "";
            echo "<option value='{$tec['tec_id']}' $selected>{$tec['tec_descripcion']}</option>";
          }
        ?>
        </select>

        <label for="port_link">Link de producción:</label><br>
        <input type="text" id="port_link" name="port_link" value="<?php echo $row['port_link']; ?>"><br>

        <label for="port_id_tipo">Tipo de portafolio:</label><br>
        <select name="port_id_tipo" id="port_id_tipo">
        <option value="">Seleccione una opción</option>
        <option value="1" <?php echo ($row['port_id_tipo'] == 1) ? 'selected' : ''; ?>>Logo</option>
        <option value="2" <?php echo ($row['port_id_tipo'] == 2) ? 'selected' : ''; ?>>Página web</option>
        </select><br>

        <label for="port_foto">Foto:</label><br>
        <input type="file" name="port_foto" id="port_foto"><br>

        <label for="port_id_estado">Estado:</label><br>
        <select name="port_id_estado" id="port_id_estado">
        <option value="">Seleccione una opción</option>
        <option value="1" <?php echo ($row['port_id_estado'] == 1) ? 'selected' : ''; ?>>Alta</option>
        <option value="2" <?php echo ($row['port_id_estado'] == 2) ? 'selected' : ''; ?>>Baja</option>
        </select><br>

        <input type="hidden" name="port_id_usuario" value="1">

        <button type="submit">Modificar</button>
      </form>
    </div>
    <div class="content_right_3">
      <figure>
        <img src="../img/undraw_experience-design_d4md.svg" alt="">
      </figure>
    </div>
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

  <!-- SCRIPT -->
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

    // SCRIPT FOR THE MULTI-SELECT TAG
    var style = document.createElement('style');
    style.setAttribute("id", "multiselect_dropdown_styles");
    style.innerHTML = `
      .multiselect-dropdown {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 5px;
        padding: 6px 18px 6px 10px;
        border-radius: 4px;
        border: solid 1px #000;
        position: relative;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23000000' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right .08rem center;
        background-size: 14px 10px;
        width: 100%;
        margin-bottom: 10px;
      }
      .multiselect-dropdown span.optext, .multiselect-dropdown span.placeholder {
        border-radius: 4px;
        display: inline-block;
      }
      .multiselect-dropdown span.optext {
        background-color: #1E90FF;
        color: #FFF;
        padding: 1px 0.75em;
        font-size: 14px;
        display: inline-block;
        position: relative;
      }
      .multiselect-dropdown span.optext .optdel {
        float: right;
        cursor: pointer;
        color: #FFF;
        font-size: 14px;
        margin-left: 5px;
      }
      .multiselect-dropdown span.placeholder {
        color: #000;
        font-size: 13px;
      }
      .multiselect-dropdown-list-wrapper {
        box-shadow: gray 0 3px 8px;
        padding: 2px;
        border-radius: 4px;
        border: solid 1px #ced4da;
        display: none;
        margin: -1px;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        background: #FFF;
      }
      .multiselect-dropdown-list-wrapper .multiselect-dropdown-search {
        margin-bottom:5px;
      }
      .multiselect-dropdown-list {
        padding: 2px;
        height: 15rem;
        overflow-y: auto;
        overflow-x: hidden;
      }
      .multiselect-dropdown-list::-webkit-scrollbar {
        width: 6px;
      }
      .multiselect-dropdown-list::-webkit-scrollbar-thumb {
        background-color:  #bec4ca;
        border-radius: 3px;
      }
      .multiselect-dropdown-list div {
        padding: 5px;
      }
      .multiselect-dropdown-list input {
        height: 1.15em;
        width: 1.15em;
        margin-right: 0.35em;
      }
      .multiselect-dropdown-list div.checked {
      }
      .multiselect-dropdown-list div:hover {
        background-color: #ced4da;
      }
      .multiselect-dropdown span.maxselected {
        width: 100%;
      }
      .multiselect-dropdown-all-selector {
        border-bottom: solid 1px #999;
      }
    `;

    document.head.appendChild(style);

    function MultiselectDropdown(options) {
      var config = {
        search: true,
        height: '15rem',
        placeholder: 'Seleccione una opción',
        txtSelected: 'selected',
        txtAll: 'Todos',
        txtRemove: 'Remove',
        txtSearch: 'Buscar...',
        ...options
      };
      function newEl(tag,attrs) {
        var e=document.createElement(tag);
        if(attrs!==undefined) Object.keys(attrs).forEach(k=>{
          if(k==='class') { Array.isArray(attrs[k]) ? attrs[k].forEach(o=>o!==''?e.classList.add(o):0) : (attrs[k]!==''?e.classList.add(attrs[k]):0)}
          else if(k==='style') {
            Object.keys(attrs[k]).forEach(ks=> {
              e.style[ks]=attrs[k][ks];
            });
          }
          else if(k==='text'){attrs[k]===''?e.innerHTML='&nbsp;':e.innerText=attrs[k]}
          else e[k]=attrs[k];
        });
        return e;
      }

      document.querySelectorAll("select[multiple]").forEach((el,k)=> {
        var div = newEl('div', {class: 'multiselect-dropdown',style: {width: '100%',padding: config.style?.padding ?? ''}});
        el.style.display='none';
        el.parentNode.insertBefore(div,el.nextSibling);
        var listWrap=newEl('div',{class:'multiselect-dropdown-list-wrapper'});
        var list=newEl('div',{class:'multiselect-dropdown-list',style:{height:config.height}});
        var search=newEl('input',{class:['multiselect-dropdown-search'].concat([config.searchInput?.class??'form-control']),style:{width:'100%',display:el.attributes['multiselect-search']?.value==='true'?'block':'none'},placeholder:config.txtSearch});
        listWrap.appendChild(search);
        div.appendChild(listWrap);
        listWrap.appendChild(list);

        el.loadOptions=()=>{
          list.innerHTML='';

          if(el.attributes['multiselect-select-all']?.value=='true') {
            var op=newEl('div',{class:'multiselect-dropdown-all-selector'})
            var ic=newEl('input',{type:'checkbox'});
            op.appendChild(ic);
            op.appendChild(newEl('label',{text:config.txtAll}));

            op.addEventListener('click',()=> {
              op.classList.toggle('checked');
              op.querySelector("input").checked=!op.querySelector("input").checked;

              var ch=op.querySelector("input").checked;
              list.querySelectorAll(":scope > div:not(.multiselect-dropdown-all-selector)")
                .forEach(i=>{if(i.style.display!=='none'){i.querySelector("input").checked=ch; i.optEl.selected=ch}});

              el.dispatchEvent(new Event('change'));
            });
            ic.addEventListener('click',(ev)=>{
              ic.checked=!ic.checked;
            });

            list.appendChild(op);
          }

          Array.from(el.options).map(o=> {
            var op=newEl('div',{class:o.selected?'checked':'',optEl:o})
            var ic=newEl('input',{type:'checkbox',checked:o.selected});
            op.appendChild(ic);
            op.appendChild(newEl('label',{text:o.text}));

            op.addEventListener('click',()=> {
              op.classList.toggle('checked');
              op.querySelector("input").checked=!op.querySelector("input").checked;
              op.optEl.selected=!!!op.optEl.selected;
              el.dispatchEvent(new Event('change'));
            });
            ic.addEventListener('click',(ev)=> {
              ic.checked=!ic.checked;
            });
            o.listitemEl=op;
            list.appendChild(op);
          });
          div.listEl=listWrap;

          div.refresh=()=> {
            div.querySelectorAll('span.optext, span.placeholder').forEach(t=>div.removeChild(t));
            var sels=Array.from(el.selectedOptions);
            if(sels.length>(el.attributes['multiselect-max-items']?.value??5)) {
              div.appendChild(newEl('span',{class:['optext','maxselected'],text:sels.length+' '+config.txtSelected}));
            } else {
              sels.map(x=> {
                var c=newEl('span',{class:'optext',text:x.text, srcOption: x});
                if((el.attributes['multiselect-hide-x']?.value !== 'true'))
                  c.appendChild(newEl('span',{class:'optdel',text:'🗙',title:config.txtRemove, onclick:(ev)=>{c.srcOption.listitemEl.dispatchEvent(new Event('click'));div.refresh();ev.stopPropagation();}}));

                div.appendChild(c);
              });
            }
            if(0==el.selectedOptions.length) div.appendChild(newEl('span',{class:'placeholder',text:el.attributes['placeholder']?.value??config.placeholder}));
          };
          div.refresh();
        }
        el.loadOptions();

        search.addEventListener('input',()=> {
          list.querySelectorAll(":scope div:not(.multiselect-dropdown-all-selector)").forEach(d=>{
            var txt=d.querySelector("label").innerText.toUpperCase();
            d.style.display=txt.includes(search.value.toUpperCase())?'block':'none';
          });
        });

        div.addEventListener('click',()=> {
          div.listEl.style.display='block';
          search.focus();
          search.select();
        });

        document.addEventListener('click', function(event) {
          if (!div.contains(event.target)) {
            listWrap.style.display='none';
            div.refresh();
          }
        });
      });
    }

    window.addEventListener('load',()=>{
      MultiselectDropdown(window.MultiselectDropdownOptions);
    });
  </script>
</body>
</html>