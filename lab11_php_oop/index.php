<?php
// Load konfigurasi dan class
include "config.php";
include "class/Database.php";
include "class/Form.php";

session_start();

// Ambil PATH_INFO (support jika pakai index.php/...)
$path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/home/index';
$segments = explode('/', trim($path, '/'));

$mod = isset($segments[0]) && $segments[0] !== '' ? $segments[0] : 'home';
$page = isset($segments[1]) && $segments[1] !== '' ? $segments[1] : 'index';

$file = "module/{$mod}/{$page}.php";

include "template/header.php";

if (file_exists($file)) {
    include $file;
} else {
    echo '<div style="padding:20px; color:#b00;">Modul tidak ditemukan: ' . htmlspecialchars($mod) . '/' . htmlspecialchars($page) . '</div>';
}

include "template/footer.php";
