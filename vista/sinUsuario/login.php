<?php
session_start();

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
    <title>Login</title>
    <link rel="icon" href="../../assets/images/homePage/logoTiendaVinilove1.png" type="image/x-icon">
    <link rel="stylesheet" href="/tienda_discos/assets/css/login/header.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/login/login.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/login/footer.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/style.css">
</head>
<body>
<header>
        <div class="logo">
            <img src="/tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="">
        </div>
        <div class="enlaces">
            <ul>
                <li><a href="/tienda_discos/vista/sinUsuario/homePage.php">Inicio</a></li>
                <li><a href="/tienda_discos/vista/sinUsuario/products.php">Productos</a></li>
                <li><a href="#">Visitanos</a></li>
                <li><a href="#">¿Quienes somos?</a></li>
                <li><a href="/tienda_discos/vista/sinUsuario/contact.php">Contacto</a></li>
            </ul>
        </div>
        <div class="iniciar">
            <ul>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <li class="dropdown">
                        <p id="username">Hola, <?php echo $_SESSION['usuario']['nombre_usuario']; ?>. ¡Bienvenido!</p>
                        <ul class="dropdown-content">
                            <li><a href="#">Mi cuenta</a></li>
                            <li><a href="?cerrar_sesion">Cerrar sesión</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li><a href="/tienda_discos/vista/sinUsuario/login.php">Iniciar sesión</a></li>
                    <li><a href="/tienda_discos/vista/sinUsuario/register.php" class="registro">Registrarse</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>
    <main>
      <div class="wrapper">
        <div class="login_box">
          <div class="login-header">
            <span>Inicia sesión</span>
          </div>

          <form action="#" class="formulario" id="formulario" method="POST">
             <!--GRUPO CORREO--->
             <div class="input_box">
              <div class="formulario__grupo" id="grupo__correo">
                <label for="correo" class="formulario__label">Email</label>
                <div class="formulario__grupo-input">
                  <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                  <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">*Por favor, introduzca una dirección de correo electrónico válida. Debe seguir el formato estándar de una dirección de correo electrónico, como por ejemplo: usuario@dominio.com</p>
              </div>
            </div>

             <!--GRUPO CONTRASEÑA--->
             <div class="input_box">
              <div class="formulario__grupo" id="grupo__password">
               <label for="password" class="formulario__label">Contraseña</label>
               <div class="formulario__grupo-input">
                 <input type="password" class="formulario__input" name="password" id="password" placeholder="">
                 <i class="formulario__validacion-estado fas fa-times-circle"></i>
               </div>
               <p class="formulario__input-error">*La contraseña debe tener al menos una letra minúscula, una mayúscula, un número, un caracter especial y entre 8 y 15 caracteres</p>
              </div>
            </div>

            <!--GRUPO TERMINOS Y CONDICIONES-->
            <div class="formulario__grupo-forgot" id="grupo__terminos">
              <label class="remember-me">
                <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                Recuérdame
              </label>
              <div class="forgot">
                <a href="#">¿Olvidaste tu contraseña?</a>
              </div>
            </div>

            <!--GRUPO MENSAJE-->
            <div class="formulario__mensaje" id="formulario__mensaje">
              <p><i class="fas fa-exclamation-triangle"><b>Error:</b></i>Rellena el formulario correctamente</p>
            </div>  
            
            <!--BOTON OCULTO PARA EL CONTROLADOR-->
            <input type="hidden" name="action" value="login">

            <!--GRUPO BOTON-->
            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <button type="submit" class="formulario__btn">Iniciar sesión</button>
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">El formulario se envió correctamente</p>
            </div>
            <div class="cuenta">
                <p>¿No tienes cuenta? <a href="/tienda_discos/vista/sinUsuario/register.php">Registrate</a></p>
              </div>
          </form>
        </div>
      </div>
    </main>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/tienda_discos/assets/js/login/login-user.js"></script>
</body>
</html>