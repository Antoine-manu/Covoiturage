<?php
// constante document root "chemin absolu jusqu'à la racine du site
define('ROOT', __DIR__);
// babse url
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];

define('SITE_URL', $url);

require_once ROOT.'/librairies/database.php';
?>