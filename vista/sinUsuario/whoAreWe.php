<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>whoAreWe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../tienda_discos/assets/css/whoAreWe/header-whoAreWe.css">
    <link rel="stylesheet" href="../tienda_discos/assets/css/whoAreWe/main-whoAreWe.css">
    <link rel="stylesheet" href="../tienda_discos/assets/css/whoAreWe/footer-whoAreWe.css">
    <link rel="stylesheet" href="../tienda_discos/assets/css/whoAreWe/style.css">
  </head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
          <div class="container">
            <!--LOGO-->
            <!--
            <a class="navbar-brand fs-4" href="#">ViniLove</a>
            -->
            <img src="../tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="" class="navbar-brand fs-4">
            <!--TOGGLE BTN-->
            <button class="navbar-toggler shadow-none border-0" 
              type="button" 
              data-bs-toggle="offcanvas" 
              data-bs-target="#offcanvasNavbar" 
              aria-controls="offcanvasNavbar" 
              >
              <span class="navbar-toggler-icon"></span>
            </button>
            <!--SIDEBAR-->
            <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <!--SIDEBAR HEADER-->
              <div class="offcanvas-header text-white border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt=""></h5>
                <button 
                  type="button" 
                  class="btn-close btn-close-white shadow-none" 
                  data-bs-dismiss="offcanvas" 
                  aria-label="Close">
                </button>
              </div>
              <!--SIDEBAR BODY-->
              <div class="offcanvas-body d-flex flex-column flex-column flex-lg-row p-4 p-lg-0">
                <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                  <li class="nav-item mx-2">
                    <a class="nav-link " aria-current="page" href="index.php?page=index">Inicio</a>
                  </li>
                  <li class="nav-item MX-2">
                    <a class="nav-link" href="#">Productos</a>
                  </li>
                  <li class="nav-item MX-2">
                    <a class="nav-link" href="#">Visitanos</a>
                  </li>
                  <li class="nav-item MX-2">
                    <a class="nav-link active" href="#">¿Quienes somos?</a>
                  </li>
                  <li class="nav-item MX-2">
                    <a class="nav-link" href="index.php?page=contact">Contacto</a>
                  </li>
                </ul>
                <!--LOGIN / SIGN UP-->
                <div class="d-flex flex-column flex-lg-row justify-content-center align-items-center gap-3">
                  <a href="index.php?page=login" class="text-black nav-link">Iniciar sesión</a>
                  <a href="index.php?page=register" class="text-white text-decoration-none px-3 py-1
                  rounded-4"
                  style="background-color: black"
                  >Registrate</a>
                </div>
              </div>
            </div>
          </div>
        </nav> 
    </header>
    <main>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            ¿Quienes somos?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                            <strong>Somos amantes apasionados de la música y creemos en la magia de los vinilos. En nuestra tienda online, nos dedicamos a ofrecer una cuidada selección de discos de vinilo que abarca géneros diversos para satisfacer los gustos más exigentes. Nos enorgullece conectar a los melómanos con piezas únicas y atemporales que capturan la esencia de la música analógica.</strong>
                            <img src="../tienda_discos/assets/images/whoAreWe/tienda.jpg" alt="" class="img-fluid custom-image">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            ¿Qué ofrecemos?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                        <div class="accordion-body">
                            <strong>En ViniLove, no solo vendemos discos de vinilo; ofrecemos una experiencia musical completa. Nuestro catálogo va más allá de la mera transacción, brindando a nuestros clientes la posibilidad de explorar joyas musicales, descubrir artistas emergentes y revivir clásicos. Además, garantizamos la calidad de cada vinilo y proporcionamos información detallada para que encuentres la pieza perfecta que complemente tu colección.</strong>
                            <img src="../tienda_discos/assets/images/whoAreWe/ofrecemos.jpg" alt="" class="img-fluid custom-image">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            ¿Por qué elegir ViniLove?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                        <div class="accordion-body">
                            <strong><ol>
                                <li class="mt-2">Variedad Excepcional: Nuestra colección abarca desde clásicos atemporales hasta las últimas novedades. Encontrarás una gama diversa para todos los gustos.</li>
                                <li class="mt-2">Calidad Garantizada: Cada vinilo en nuestra tienda ha sido seleccionado cuidadosamente, asegurando la autenticidad y calidad del sonido. Nos comprometemos a ofrecer solo lo mejor.</li>
                                <li class="mt-2">Experiencia del Usuario: Diseñamos nuestra plataforma pensando en ti. Navegación fácil, descripciones detalladas y un servicio al cliente excepcional hacen que tu experiencia de compra sea única y satisfactoria.</li>
                                <li class="mt-2">Envío Seguro: Embalamos tus vinilos con el máximo cuidado para garantizar que lleguen en perfecto estado. Nos preocupamos por la seguridad de tus preciadas adquisiciones.</li>
                                <li class="mt-2">Compromiso con la Comunidad Musical: Nos enorgullece ser parte de la comunidad musical. Colaboramos con artistas locales, promovemos eventos musicales y compartimos el amor por la música en todas sus formas.</li>
                                <p class="mt-5">En ViniLove, no solo vendemos discos; compartimos la pasión por la música y queremos que cada compra sea una experiencia memorable. ¡Descubre la diferencia de comprar con nosotros y haz que tu colección de vinilos sea única!</p>
                            </ol></strong>
                            <img src="../tienda_discos/assets/images/whoAreWe/vinilove.jpg" alt="" class="img-fluid custom-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </main>
    <footer class="bg-white text-dark pt-5 pb-4 mt-5">
      <div class="container text-center text-md-left">
        <div class="row text-center text-md-left">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-black">ViniLove</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus eius qui corrupti sint libero minima consequuntur, nam deserunt possimus asperiores voluptatem autem deleniti aliquid eum repellendus natus aliquam saepe laudantium!</p>
          </div>
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-black">Ayuda</h5>
            <p>
              <a href="index.php?page=legal_notices" class="text-black" id="ayuda" style="text-decoration:none;"> Avisos legales</a>
            </p>
            <p>
              <a href="index.php?page=cookies" class="text-black" id="ayuda" style="text-decoration:none;">Política de cookies</a>
            </p>
            <p>
              <a href="index.php?page=service_contracting_management" class="text-black" id="ayuda" style="text-decoration:none;">Condiciones de uso</a>
            </p>
            <p>
              <a href="index.php?page=privacy_policy" class="text-black" id="ayuda" style="text-decoration:none;">Política de privacidad</a>
            </p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-black">Noticias</h5>
            <p>
              <a href="" class="text-black" style="text-decoration:none;">Últimas novedades</a>
            </p>
            <p>
              <a href="" class="text-black" style="text-decoration:none;">Ofertas especiales</a>
            </p>
            <p>
              <a href="" class="text-black" style="text-decoration:none;">ViniLove</a>
            </p>
            <p>
              <a href="" class="text-black" style="text-decoration:none;">Consejos sobre vinilos</a>
            </p>
          </div>
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h5 class="text-uppercase mb-4 font-weight-bold text-black">Contacto</h5>
            <p>
              <i class="icon-home mr-3"></i>Calle Mayor, Alcorcón (Madrid)
            </p>
            <p>
              <i class="icon-phone mr-3"></i> ViniLove@gmail.com
            </p>
            <p>
              <i class="icon-mail mr-3"></i> 919 91 91 91
            </p>
          </div>
        </div>
        <hr class="mb-4">
        <div class="row align-items-center">
          <div class="col-md-7 col-lg-8">
            <p>Copyright ©2023 All rights reserved by:
              <a href="#" style="text-decoration:none;">
            <strong class="text-black">ViniLove</strong></a>
            </p>
          </div>
          <div class="col-md-5 col-lg-4">
            <div class="text-center text-md-right">
              <ul class="list-unstyled list-inline">
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-black" style="font-size:23px;"><i class="icon-facebook2"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-black" style="font-size:23px;"><i class="icon-twitter"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-black" style="font-size:23px;"><i class="icon-whatsapp"></i></a>
                </li>
                <li class="list-inline-item">
                  <a href="#" class="btn-floating btn-sm text-black" style="font-size:23px;"><i class="icon-instagram"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>