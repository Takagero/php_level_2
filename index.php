<?php
error_reporting(E_ALL);
// session_start();
header('Content-Type: text/html; charset=utf-8');

define ('DIRSEP', DIRECTORY_SEPARATOR);


// Узнаём путь до файлов
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP ;
define ('site_path', $site_path);

?>