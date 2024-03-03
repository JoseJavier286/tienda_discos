<?php
session_start();

// Definir el rol del usuario por defecto
$rolUsuario = 'user';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['id_usuario'])) {
    // Usuario ha iniciado sesión
    $nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
    $rolUsuario = isset($_SESSION['rol']) ? $_SESSION['rol'] : 'user'; // Obtener el rol del usuario desde la sesión
}

// Verificar si se hizo clic en "Cerrar sesión"
if (isset($_GET['cerrar_sesion'])) {
    // Destruir todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir a login.php
    header("Location: /tienda_discos/vista/sinUsuario/login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../../assets/images/homePage/logoTiendaVinilove1.png" type="image/x-icon">
    <link rel="stylesheet" href="/tienda_discos/assets/css/products/header1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/products/main1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/products/footer1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/products/style.css">
</head>
<body>
    <header>
      <div class="logo">
        <img src="/tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="">
      </div>
      <div class="enlaces">
        <ul>
          <li><a href="/tienda_discos/vista/sinUsuario/homePage.php" class="inicio">Inicio</a></li>
          <li><a href="/tienda_discos/vista/sinUsuario/products.php" id="productos">Productos</a></li>
          <li><a href="#">Visitanos</a></li>
          <li><a href="#">¿Quienes somos?</a></li>
          <li><a href="/tienda_discos/vista/sinUsuario/contact.php">Contacto</a></li>
        </ul>
      </div>
      <div class="iniciar">
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
      <!--PARTE GRIS-->
      <div class="container-carousel">
          <!--PARTE CELESTE-->
        <div class="carruseles" id="slider">
          <section class="slider-section">
            <img src="/tienda_discos/assets/images/products/foto1.jpg" alt="foto1">
          </section>
          <section class="slider-section">
            <img src="/tienda_discos/assets/images/products/foto2.jpg" alt="foto2">
          </section>
          <section class="slider-section">
            <img src="/tienda_discos/assets/images/products/foto3.jpg" alt="foto3">
          </section>
          <section class="slider-section">
            <img src="/tienda_discos/assets/images/products/foto4.jpg" alt="foto3">
          </section>
          <section class="slider-section">
            <img src="/tienda_discos/assets/images/products/foto5.jpg" alt="foto3">
          </section>
        </div>
          <div class="btn-left"><i class='bx bx-chevron-left'></i></div>
          <div class="btn-right"><i class='bx bx-chevron-right' ></i></div>
        </div>
    </main>
    <div class="container" id="container">
    <?php if (isset($_SESSION['id_usuario'])): ?>
        <?php if ($rolUsuario === 'admin'): ?>
            <!-- Esta sección solo se mostrará si el usuario es un administrador -->
            <section class="admin-section">
                <!-- Cuadro de búsqueda -->
                <div class="search-box">
                  <input type="text" id="searchInput" placeholder="Buscar álbum...">
                  <button onclick="buscarProductos()" class="buscar">Buscar</button>
                  <button id="resetButton" class="buscar">Mostrar Todos los Álbumes</button>
                </div>
                <!-- Secciones de búsqueda por años -->
                <form id="filtroForm" method="post">
                  <input type="checkbox" name="decada" value="50" class="cinco"> 1950
                  <input type="checkbox" name="decada" value="60" class="seis"> 1960
                  <input type="checkbox" name="decada" value="70" class="siete"> 1970
        
                </form>
                <!-- Botones de acción -->
                <div class="action-buttons">
                    <!-- Asigna un id único a cada botón para identificarlo fácilmente -->
                    <button id="consultarBtn">Consultar productos</button>
                    <button id="editarBtn">Editar productos</button>
                    <button id="borrarBtn">Borrar productos</button>
                    <button id="insertarBtn">Insertar productos</button>
                </div>
            </section>
        <?php else: ?>
            <!-- Esta sección se mostrará para usuarios no administradores -->
            <section class="admin-section">
                <div class="search-box">
                  <input type="text" id="searchInput" placeholder="Buscar álbum...">
                  <button onclick="buscarProductos()" class="buscar">Buscar</button>
                  <button id="resetButton" class="buscar">Mostrar Todos los Álbumes</button>
                </div>
                <form id="filtroForm" method="post">
                  <input type="checkbox" name="decada" value="50" class="cinco"> 1950
                  <input type="checkbox" name="decada" value="60" class="seis"> 1960
                  <input type="checkbox" name="decada" value="70" class="siete"> 1970
                </form>
                <div class="action-buttons">
                    <!-- Asigna un id único a cada botón para identificarlo fácilmente -->
                    <button id="consultarBtn">Consultar productos</button>
                    <button id="editarBtn">Editar productos</button>
                    <button id="borrarBtn">Borrar productos</button>
                    <button id="insertarBtn">Insertar productos</button>
                </div>
            </section>
        <?php endif; ?>
    <?php endif; ?>
</div>
    <section>
    <h2 class="titulo_tienda" id="titulo">¡DESCUBRE NUESTRAS NOVEDADES!</h2>
    <!--CONTENEDOR PARA METER LAS CARDS DINAMICAMENTE CON JAVASCRIPT-->
    <div id="contenedor-productos" class="grid-container">

    </div>
    
    </section>
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
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="/tienda_discos/assets/js/products/products4.js"></script>
</body>
</html>
