<?php
session_start();
var_dump($_SESSION);
// Verificamos si el usuario ha iniciado sesión
if (isset($_SESSION['id_usuario'])) {
    // El usuario ha iniciado sesión
    $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
}

// Verificamos si se hizo clic en "Cerrar sesión"
if (isset($_GET['cerrar_sesion'])) {
    // Destruimos todas las variables de sesión
    session_unset();

    // Destruimos la sesión
    session_destroy();

    // Redirigimos a login.php
    header("Location: /tienda_discos/vista/sinUsuario/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="../../assets/images/homePage/logoTiendaVinilove1.png" type="image/x-icon">
    <link rel="stylesheet" href="/tienda_discos/assets/css/contact/header1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/contact/main.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/contact/footer.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/contact/style.css">
  </head>
<body>
<header>
      <div class="logo">
        <img src="/tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="">
      </div>
      <div class="enlaces">
        <ul>
          <li><a href="/tienda_discos/vista/sinUsuario/homePage.php" class="inicio">Inicio</a></li>
          <li><a href="/tienda_discos/vista/sinUsuario/products.php" >Productos</a></li>
          <li><a href="#">Visitanos</a></li>
          <li><a href="#">¿Quienes somos?</a></li>
          <li><a href="#" id="productos">Contacto</a></li>
        </ul>
      </div>
      <div class="iniciar" onmouseover="mostrarMenu()" onmouseout="ocultarMenu()">
        <ul>
            <?php if (isset($_SESSION['id_usuario'])): ?>
                <li class="dropdown">
                    <span id="username">Hola, <?php echo $nombreUsuario; ?>. ¡Bienvenido!</span>
                    <div class="dropdown-content" id="menuDesplegable">
                        <a href="#">Mi cuenta</a>
                        <a href="?cerrar_sesion">Cerrar sesión</a>
                    </div>
                </li>
            <?php else: ?>
                <li><a href="/tienda_discos/vista/sinUsuario/login.php">Iniciar sesión</a></li>
                <li><a href="/tienda_discos/vista/sinUsuario/register.php" class="registro">Registrarse</a></li>
            <?php endif; ?>
        </ul>
      </div>
    </header>
    <main class="contenedor-principal">
        <form action="" class="formulario" id="formulario">
            <!-- Grupo: Nombre -->
            <div class="formulario__grupo" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre:</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Juan Iglesias">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">*El nombre tiene que ser de 4 a 40 caracteres y solo puede contener letras mayúsculas, minúsculas, acentos y espacios.</p>
            </div>

            <!-- Grupo: Correo Electrónico -->
            <div class="formulario__grupo" id="grupo__correo">
                <label for="correo" class="formulario__label">Correo Electrónico:</label>
                <div class="formulario__grupo-input">
                    <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">*Por favor, introduzca una dirección de correo electrónico válida. Debe seguir el formato estándar de una dirección de correo electrónico, como por ejemplo: usuario@dominio.com</p>
            </div>

            <!-- Grupo: Mensaje -->
            <div id="grupo__textarea" class="formulario__grupo">
                <label for="textarea" class="formulario__label">Mensaje:</label>
                <div id="formulario__grupo-textarea" class="formulario__grupo-input">
                    <textarea id="textarea" name="textarea" class="formulario__input" placeholder="Escribe tu mensaje aquí"></textarea>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">*El mensaje debe tener máximo 200 caracteres. Solo se permiten letras mayúsculas, minúsculas, comas, puntos, simbolos de interrogación y números.</p>
            </div>

            <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__grupo" id="grupo__terminos">
                <label class="formulario__label">
                    <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                    Acepto los Terminos y Condiciones
                </label>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn">Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
        </form>

        <div class="contact-info">
            <h4>Información</h4>
            <ul>
                <li><span class="icon-location2"></span>Alcorcón (Madrid)</li>
                <li><span class="icon-phone"></span>911 91 91 91</li>
                <li><span class="icon-envelop"></span>Vinilove@gmail.com</li>
            </ul>
            <p id="frase">Llámanos, escríbenos o si no también nos puedes encontrar en la siguiente dirección: C. del gas, 30, 28918 Alcorcón, Madrid</p>
        </div>
    </main>
    <div class="center-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3040.778320647034!2d-3.804025223575035!3d40.34726335986376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4189005d61a3f3%3A0x649540e3b619faf8!2svinilove!5e0!3m2!1ses!2ses!4v1705578291918!5m2!1ses!2ses" 
        width="1400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    <footer>
      <article class="vinilove">
          <h2>ViniLove</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br> Necessitatibus eius qui corrupti sint libero minima consequuntur, <br> nam deserunt possimus asperiores voluptatem autem deleniti aliquid <br> eum repellendus natus aliquam saepe laudantium!</p>
        </article>
        <article class="ayuda">
          <h2>Ayuda</h2>
          <a href="#">Avisos legales</a>
          <a href="#">Política de cookies</a>
          <a href="#">Condiciones de uso</a>
          <a href="#">Política de privacidad</a>
        </article>
        <article class="noticias">
          <h2>Noticias</h2>
          <a href="#">Últimas novedades</a>
          <a href="#">Ofertas especiales</a>
          <a href="#">ViniLove</a>
          <a href="#">Consejos sobre vinilos</a>
        </article>
        <article class="contacto">
          <h2>Contacto</h2>
          <p><i class="icon-home mr-3"></i>Calle Mayor, Alcorcón (Madrid)</p>
          <p><i class="icon-phone mr-3"></i> ViniLove@gmail.com</p>
          <p><i class="icon-mail mr-3"></i> 919 91 91 91</p>
      </article>
    </footer>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/tienda_discos/assets/js/contact/contacto.js"></script>
  </body>
</html>