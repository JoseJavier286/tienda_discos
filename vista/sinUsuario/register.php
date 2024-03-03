<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" href="../../assets/images/homePage/logoTiendaVinilove1.png" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="./../../assets/css/register/header1.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/register/register.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/register/footer.css">
    <link rel="stylesheet" href="/tienda_discos/assets/css/homePage/style.css">
</head>
<body>
    <header>
      <div class="logo">
        <img src="/tienda_discos/assets/images/homePage/logoTiendaVinilove1.png" id="logo" alt="">
      </div>
      <div class="enlaces">
        <ul>
        <li><a href="index.php?page=homepage" class="inicio">Inicio</a></li>
          <li><a href="index.php?page=products">Productos</a></li>
          <li><a href="#">Visitanos</a></li>
          <li><a href="#">¿Quienes somos?</a></li>
          <li><a href="/tienda_discos/index.php?page=contact">Contacto</a></li>
        </ul>
      </div>
      <div class="iniciar">
        <ul>
          <li><a href="/tienda_discos/index.php?page=login">Iniciar sesión</a></li>
          <li><a href="#" class="registro">Registrarse</a></li>
        </ul>
      </div>
    </header>
    <main>
      <div class="wrapper">
        <div class="login_box">
          <div class="login-header">
            <span>Registrate</span>
          </div>
        <!--La clase la utilizamos para el css y el id para el javascript--->
          <form action="" class="formulario" id="formulario" method="POST">
            
             <!--GRUPO NOMBRE  -->
             <div class="input_box">
                <div class="formulario__grupo" id="grupo__nombre">
                  <label for="nombre" class="formulario__label">Nombre</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Juan">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">*El nombre solo puede contener letras, acentos y espacios. Tiene que tener mínimo 4 caracteres y máximo 16</p>
                </div>
            </div>

            <!--GRUPO APELLIDOS  -->
            <div class="input_box">
                <div class="formulario__grupo" id="grupo__apellidos"> 
                    <label for="apellidos" class="formulario__label">Apellidos</label>
                    <div class="formulario__grupo-input">
                        <input type="text" class="formulario__input" name="apellidos" id="apellidos" placeholder="Iglesias">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">*El apellido solo puede contener letras, acentos y espacios. Tiene que tener mínimo 4 caracteres y máximo 36. </p>
                </div>
            </div>


            <!--GRUPO DIRECCION  -->
            <div class="input_box">
                <div class="formulario__grupo" id="grupo__direccion">
                  <label for="direccion" class="formulario__label">Dirección</label>
                  <div class="formulario__grupo-input">
                  <input type="text" class="formulario__input" name="direccion" id="direccion" placeholder="Calle Mayor N26 3d">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">*La dirección sólo puede contener letras mayúsculas, minúsculas, números y espacios.</p>
                </div>
            </div>

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

            
            <!--GRUPO TELEFONO-->
            <div class="input_box">
                <div class="formulario__grupo" id="grupo__telefono">
                <label for="telefono" class="formulario__label">Teléfono</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="91 919 91 91">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">*El teléfono puede contener números y espacios, el espacio no puede ir al principio y debe estar entre 7 y 14 dígitos</p>
                </div>
            </div>

               <!--GRUPO TELEFONO-->
               <div class="input_box">
                <div class="formulario__grupo" id="grupo__postal">
                <label for="postal" class="formulario__label">Código postal</label>
                  <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="postal" id="postal" placeholder="2394">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">*El codigo postal solo puede contener números sin espacios. Mínimo 4 números</p>
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
            
             <!--GRUPO CONTRASEÑA 2-->
             <div class="input_box">
                <div class="formulario__grupo" id="grupo__password2">
                  <label for="password2" class="formulario__label">Repetir contraseña</label>
                  <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password2" id="password2" placeholder="">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                  </div>
                  <p class="formulario__input-error">*Las contraseñas deben ser iguales</p>
                </div>
            </div>
 

            <!--GRUPO TERMINOS Y CONDICIONES-->
            <div class="formulario__grupo-forgot" id="grupo__terminos">
              <label class="remember-me">
                <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
                He leído y acepto la política de privacidad
              </label>
            </div>

            <!--GRUPO MENSAJE-->
            <div class="formulario__mensaje" id="formulario__mensaje">
              <p><i class="fas fa-exclamation-triangle"><b>Error:</b></i>Rellena el formulario correctamente</p>
            </div>

            <input type="hidden" name="action" value="register">
            
            <!--GRUPO BOTON-->
            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <button type="submit" class="formulario__btn">Registrarse</button>
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">El formulario se envió correctamente</p>
            </div>
            <div class="cuenta">
                <p>¿Ya tienes cuenta? <a href="/tienda_discos/vista/sinUsuario/login.php">Inicia sesión</a></p>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/tienda_discos/assets/js/register/register.js"></script>
</body>
</html>