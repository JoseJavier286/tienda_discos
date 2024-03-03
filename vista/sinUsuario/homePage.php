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
    <title>HomePage</title>
    <link rel="icon" href="../../assets/images/homePage/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/header1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/main1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/footer1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/style.css">
</head>
<body>
<header>
    <div class="logo">
        <img src="/tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="">
    </div>
    <div class="enlaces">
        <ul>
            <li><a href="#" class="inicio">Inicio</a></li>
            <li><a href="/tienda_discos/vista/sinUsuario/products.php">Productos</a></li>
            <li><a href="#">Visitanos</a></li>
            <li><a href="#">¿Quienes somos?</a></li>
            <li><a href="/tienda_discos/vista/sinUsuario/contact.php">Contacto</a></li>
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
    <main>
      <div class="banner">
        <img src="/tienda_discos/assets/images/homePage/banner1.jpg" id="banner" alt="">
      </div>
      <section class="arriba">
        <article class="izquierda">
          <h2>Descube el sonido auténtico, descubre ViniLove</h2>
          <p>En ViniLove, estamos apasionados por el arte y la música en vinilo. Nos dedicamos a ofrecer una cuidadosa selección de los vinilos más auténticos y emocionantes para todos los amantes de la música. Nuestra misión es conectar a las personas con la riqueza del sonido analógico y la experiencia única de coleccionar vinilos.</p>
          <p>Explora nuestra colección cuidadosamente curada, donde encontrarás desde clásicos atemporales hasta las últimas novedades. Nos enorgullece ofrecer no solo discos de alta calidad, sino también una experiencia de compra que refleje nuestra pasión por la música.</p>
          <p>En ViniLove, creemos en la magia de sumergirse en la profundidad de los surcos y disfrutar de la música tal como fue concebida. Cada vinilo cuenta una historia, y estamos aquí para ayudarte a descubrir la tuya.</p>
          <p>Únete a nuestra comunidad de melómanos y embárcate en un viaje sonoro que trasciende el tiempo. ¡Gracias por elegir ViniLove como tu destino para explorar el mundo del vinilo!</p>
        </article>
        <article class="derecha">
          <img src="/tienda_discos/assets/images/homePage/fotoDerecha.jpg" alt="" id="derecha">
        </article>
      </section>
      <h2 class="novedades">¡Descubre nuestras novedades!</h2>
      <div class="primero">
        <article>
          <img src="/tienda_discos/assets/images/homePage/outsiders.jpg" alt="" class="img-fluid">
          <h3>Summer is here</h3>
          <h5 class="cantante">The Outsiders</h5>
          <h5 class="precio"><del>8,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">6,15€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/juke.jpg" alt="" class="img-fluid">
          <h3>Long bad day</h3>
          <h5 class="cantante">Jukebox Racket</h5>
          <h5 class="precio"><del>4,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">3,50€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/lobosnegros.jpg" alt="" class="img-fluid">
          <h3>Obsesión</h3>
          <h5 class="cantante">Lobos Negros</h5>
          <h5 class="precio"><del>9,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">6,95€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/ride.jpg" alt="" class="img-fluid">
          <h3>Ride this train</h3>
          <h5 class="cantante">Johnny Cash</h5>
          <h5 class="precio"><del>17,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">12,25€</h5>
          <button class="boton">Comprar</button>
        </article>
      </div>
      <div class="primero">
        <article>
          <img src="/tienda_discos/assets/images/homePage/baila.jpg" alt="" class="img-fluid">
          <h3>Baila Srta?</h3>
          <h5 class="cantante">3000 Hombres</h5>
          <h5 class="precio"><del>13,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">8,95€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/buddy.jpg" alt="" class="img-fluid">
          <h3>Buddy Holly</h3>
          <h5 class="cantante">Buddy Holly</h5>
          <h5 class="precio"><del>15,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">10,95€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/love.jpg" alt="" class="img-fluid">
          <h3>Da Capo</h3>
          <h5 class="cantante">Love</h5>
          <h5 class="precio"><del>21,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">15,95€</h5>
          <button class="boton">Comprar</button>
        </article>
        <article>
          <img src="/tienda_discos/assets/images/homePage/volume.jpg" alt="" class="img-fluid">
          <h3>Volume 3</h3>
          <h5 class="cantante">The Easybeats</h5>
          <h5 class="precio"><del>17,95€</del></h5>
          <h5 class="descuento">DESCUENTO 30%</h5>
          <h5 class="final">11,95€</h5>
          <button class="boton">Comprar</button>
        </article>
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
    <script src="/tienda_discos/assets/js/homePage/homePage1.js"></script>
</body>
</html>
