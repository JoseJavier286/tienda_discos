<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'homepage';

if ($page === 'homepage') {
    require("vista/sinUsuario/homepage.php");
} elseif ($page === 'contact') {
    require("vista/sinUsuario/contact.php");
} elseif ($page === 'login') {
    require("vista/sinUsuario/login.php");
} elseif ($page === 'register') {
    require("vista/sinUsuario/register.php");
} elseif ($page === 'legal_notices') {
    require("vista/sinUsuario/legal_notices.php");
} elseif ($page === 'cookies') {
    require("vista/sinUsuario/cookies.php");
} elseif ($page === 'service_contracting_management') {
    require("vista/sinUsuario/service_contracting_management.php");
} elseif ($page === 'privacy_policy') {
    require("vista/sinUsuario/privacy_policy.php");
} elseif ($page === 'whoAreWe') {
    require("vista/sinUsuario/whoAreWe.php");
} elseif ($page === 'products') {
    require("vista/sinUsuario/products.php");
} else {
    require("vista/sinUsuario/homepage.php");
}

