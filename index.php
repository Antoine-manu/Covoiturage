<?php
if (!session_id()) {
    session_start();
}
// constante document root "chemin absolu jusqu'à la racine du site
define('ROOT', __DIR__);
// babse url
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'];

define('SITE_URL', $url);

require_once ROOT.'/librairies/database.php';
// récupère le paramètre action passé en get grâce au htaccess
$uri = $_GET['action'] ?? '';
// rétire l'extension
$uri = basename($uri, '.php');

// si le chemin reconstruit correspond à un fichier tu l'inclus
if (file_exists('controllers/' . $uri . 'Controller.php')) {
    require __DIR__ . '/controllers/' . $uri . 'Controller.php';
    // si c'est la page index du inclus la homepage
} else if ($uri == 'index' || $uri == '') {
    require __DIR__ . '/controllers/homeController.php';
    // sinon tu envoie un page 404
} else {
    header('Status: 404 Not Found');
    require __DIR__ . '/views/404.php';
}


?>