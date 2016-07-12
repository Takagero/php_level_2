<?php
error_reporting(E_ALL);
// session_start();
header('Content-Type: text/html; charset=utf-8');

define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

// Startup
require_once($site_path . 'startup' . DIRSEP . 'startup.php');

# Соединяемся с БД
$db = new PDO('mysql:host=localhost;dbname=super_blog', 'root', ''); //excellent

$registry->set ('db', $db);

//В этом примере мы сначала создаём новый экземпляр библиотеки PDO и соединяемся с нашей БД MySQL. Потом делаем переменную $db доступной глобально при помощи класса Registry.

# Загружаем объект Template
$template = new Template($registry);
$registry->set ('template', $template);

$model = new Model($registry);
$registry->set ('model', $model);

# Загружаем router
$router = new Router($registry);
$registry->set ('router', $router);


$router->setPath (site_path . 'controllers');

$router->delegate();

?>